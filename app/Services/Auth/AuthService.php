<?php
    namespace App\Services\Auth;

    use Illuminate\Support\Facades\Auth;

    class AuthService {

        public function checkAuth()
        {
            return Auth::check();
        }
    }
