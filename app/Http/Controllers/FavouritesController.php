<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Models\User;
    use App\Models\Movie;
    use App\Models\Favourite;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class FavouritesController extends Controller
    {
        public function index() {
            $session_id = session('user_id');
            $user = User::find($session_id);
            if (!isset($user))
                return redirect('login');
            
            return view('favourites')->with('user', $user);
        }

        public function movieSearch($title)
        {
            $API_KEY = 'k_64j467tl';

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, 'https://imdb-api.com/en/API/SearchMovie/'.$API_KEY.'/'.$title);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);
            
            return $result;
        }

        public function movieCheck($title)
        {
            $session_id = session('user_id');

            $movie = Movie::where('title', $title)->first();

            $num = 0;
            $user = null;

            if ($movie != null) {
                $num = $movie['num_favourites'];
                $user = $movie->users()->where('user_id', $session_id)->first();
            }

            $present = false;
            if ($user != null)
                $present = true;

            $data = array(
                'number' => $num,
                'present' => $present
            );

            return $data;
        }

        public function getFavourites()
        {
            $session_id = session('user_id');
            $user = User::find($session_id);
            $favourites = $user->favourites()->get(['title', 'description', 'poster']);
            return $favourites;
        }

        public function addFavourite($title, $description, $poster)
        {
            $session_id = session('user_id');

            $movie = Movie::where('title', $title)->first();
            if ($movie == null) {
                Movie::create([
                    'title' => $title,
                    'description' => $description,
                    'poster' => base64_decode($poster)
                ]);
            }

            $movie_id = Movie::where('title', $title)->first()->id;
            
            Favourite::create([
                'user_id' => $session_id,
                'movie_id' => $movie_id
            ]);
        }

        public function removeFavourite($title)
        {
            $session_id = session('user_id');

            $movie_id = Movie::where('title', $title)->first()->id;

            $favourite = Favourite::where('movie_id', $movie_id)
            ->where('user_id', $session_id);

            $favourite->delete();
        }
    }

?>