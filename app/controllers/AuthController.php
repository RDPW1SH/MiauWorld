<?php
class AuthController
{
    public function login()
    {
        require_once './app/views/auth/login.php';
    }

    public function register()
    {

        require_once './app/views/auth/register.php';
    }

    public function forgotPassword()
    {

        require_once './app/views/auth/forgot-password.php';
    }
}
