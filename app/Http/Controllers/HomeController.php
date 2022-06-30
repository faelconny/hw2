<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Models\User;
    use App\Models\Post;
    use App\Models\Like;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class HomeController extends Controller
    {
        public function index() {
            $session_id = session('user_id');
            $user = User::find($session_id);
            if (!isset($user))
                return redirect('login');
            
            return view('home')->with('user', $user)->with('csrf_token', csrf_token());
        }

        public function getPosts()
        {
            $posts = Post::orderBy('created_at', 'desc')->get();
            $data = array();
            foreach ($posts as $post) {
                $data[] = array(
                    'user' => $post->user()->first(),
                    'post' => $post,
                    'date' => $this->calculateTime($post['created_at'])
                );
            }
            return $data;
        }

        public function addPost(Request $req)
        {
            $path = 'posts/pictures/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $picture = $req->picture;
            if ($picture != null) {
                $picture_name = $picture->getClientOriginalName();
                $picture->move($path, $picture_name);
                $dest_dir = $path.$picture_name;
                $data = array('text' => $req->text, 'picture' => $dest_dir);
            } else {
                $data = array('text' => $req->text, 'picture' => null);
            }
            $content = json_encode($data, JSON_UNESCAPED_UNICODE);
            $session_id = session('user_id');
            $post = Post::create([
                 'user_id' => $session_id,
                 'content' => $content
            ]);
        }

        public function getLikes()
        {
            $session_id = session('user_id');
            $user = User::find($session_id);
            $likes = $user->likes()->get();
            return $likes;
        }

        public function addLike($post_id)
        {
            $session_id = session('user_id');
            Like::create([
                'user_id' => $session_id,
                'post_id' => $post_id
            ]);
        }

        public function removeLike($post_id)
        {
            $session_id = session('user_id');
            $like = Like::where('user_id', $session_id)->where('post_id', $post_id);
            $like->delete();
        }

        private function calculateTime($time_string)
        {
            $time = strtotime($time_string);
            $sec = time() - $time;
            if ($sec < 60) {
                return $sec.' sec';
            } else if (intval($sec / 60) < 60) {
                $min = intval($sec / 60);
                return $min.' min';
            } else if (intval($sec / 3600) < 24) {
                $h = intval($sec / 3600);
                return $h.' h';
            } else if (intval($sec / 86400) < 30) {
                $d = intval($sec / 86400);
                return $d.' g';
            }
        }
    }
?>