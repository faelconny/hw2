<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;

    class LoginController extends Controller
    {
        public function login() 
        {
            if(session('user_id') != null) {
                return redirect('picture');
            } else {
                return view('login')->with('csrf_token', csrf_token());
            }
        }

        public function checkLogin() 
        {
            $user = User::where('username', request('login-username'))->first();

            if($user !== null && password_verify(request('login-password'), $user->password)) {
                Session::put('user_id', $user->id);
                return redirect('picture');
            } else {
                return view('login')->with('error', true);
            }
        }

        public function checkSignup()
        {
            $form = request();

            if (!$this->checkErrors($form)) {
                $hash_password = password_hash($form['signup-password'], PASSWORD_DEFAULT);
                $user =  User::create([
                    'username' => $form['signup-username'],
                    'email' => $form['email'],
                    'password' => $hash_password,
                    'name' => $form['name'],
                    'surname' => $form['surname']
                    ]);
                Session::put('user_id', $user->id);
                return redirect('picture');
            } else {
                redirect('login')->withName();
            }
        }

        public function checkUsername($username)
        {
            $user = User::where('username', $username)->first();
            if ($user != null) {
                return array('present' => true);
            }
            return array('present' => false);
        }

        public function checkEmail($email)
        {
            $user = User::where('email', $email)->first();
            if ($user != null) {
                return array('present' => true);
            }
            return array('present' => false);
        }

        public function logout() 
        {
            Session::flush();
            return view('logout');
        }

        private function checkErrors($form)
        {
            $username = User::where('username', $form['signup-username'])->first();
            if ($username != null || !preg_match('/^[a-z0-9_\.]+$/', $form['signup-username'])) {
                return true;
            }

            $email = User::where('username', $form['email'])->first();
            $regex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
            if ($email != null || !preg_match($regex, $form['email'])) {
                return true;
            }

            $regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/';
            if (!preg_match($regex, $form['signup-password'])) {
                return true;
            }

            return false;
        }
    }
    
?>