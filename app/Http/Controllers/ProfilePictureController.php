<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class ProfilePictureController extends Controller
    {
        public function index() 
        {
            $session_id = session('user_id');
            $user = User::find($session_id);
            if (!isset($user))
                return redirect('login');
            
            if ($user['picture'] != null)
                return redirect('home');
            
            return view('picture')->with('user', $user);
        }

        public function api()
        {
            $API_KEY = 'kneNgeCyMA2ReyUfNCyrOjEYeUkfdeKVwPYNnLhe';

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod?api_key='.$API_KEY.'&count=9');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);
            
            return $result;
        }

        public function pictureLoad($picture)
        {
            $user = User::find(session('user_id'));
            $user->picture = base64_decode($picture);
            $user->save();
        }
    }
?>