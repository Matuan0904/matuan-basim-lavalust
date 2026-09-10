<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle(Closure $next)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (
            !isset($_SESSION['user_authenticated']) ||
            $_SESSION['user_authenticated'] !== true
        ) {
            redirect('/login');
            return;
        }

        return $next();
    }
}