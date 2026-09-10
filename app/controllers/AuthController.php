<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Login Page
    |--------------------------------------------------------------------------
    */
    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // If already logged in, go directly to products
        if (
            isset($_SESSION['user_authenticated']) &&
            $_SESSION['user_authenticated'] === true
        ) {
            redirect('/products');
            return;
        }

        $this->call->view('auth/login');
    }

    /*
    |--------------------------------------------------------------------------
    | Authenticate User
    |--------------------------------------------------------------------------
    */
    public function authenticate()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $username = trim($this->io->post('username'));
        $password = $this->io->post('password');

        // Demo credentials required for the laboratory exercise
        if ($username === 'admin' && $password === 'admin123') {

            session_regenerate_id(true);

            $_SESSION['user_authenticated'] = true;
            $_SESSION['username'] = $username;

            redirect('/products');
            return;
        }

        // Login failed
        $_SESSION['login_error'] = 'Invalid username or password.';

        redirect('/login');
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */
    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        redirect('/login');
    }
}