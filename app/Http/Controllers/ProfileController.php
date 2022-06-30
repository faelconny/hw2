<?php

    namespace App\Http\Controllers;

    use Illuminate\Routing\Controller;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class ProfileController extends Controller
    {
        public function index() {
            $session_id = session('user_id');
            $user = User::find($session_id);
            if (!isset($user))
                return redirect('login');
            
            return view('profile')
            ->with('user', $user)
            ->with('csrf_token', csrf_token());
        }

        public function checkChangePassword()
        {
            $session_id = session('user_id');
            $user = User::find($session_id)->first();

            $current_user = User::find($session_id);
            if ($user == null && password_verify(request('login-password'), $user->password)) {
                return view('profile')
                ->with('error', true)
                ->with('user', $current_user)
                ->with('csrf_token', csrf_token());
            }

            $user->password = password_hash(request('new-password'), PASSWORD_DEFAULT);
            $user->save();

            
            return view('profile')
            ->with('error', false)
            ->with('user', $current_user)
            ->with('csrf_token', csrf_token());
        }
    }
?>