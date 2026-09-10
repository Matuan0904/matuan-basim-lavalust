<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| URI ROUTING
|--------------------------------------------------------------------------
*/

// Home
$router->get('/', 'Welcome::index');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

$router->get('/login', 'AuthController::login');
$router->post('/login', 'AuthController::authenticate');
$router->get('/logout', 'AuthController::logout');

/*
|--------------------------------------------------------------------------
| Product CRUD Routes
| Protected by AuthMiddleware
|--------------------------------------------------------------------------
*/

$router->group(
    [
        'prefix' => '/products',
        'middleware' => 'auth'
    ],
    function ($router) {

        // READ
        $router->get('/', 'ProductController::index');

        // CREATE
        $router->get('/create', 'ProductController::create');
        $router->post('/store', 'ProductController::store');

        // UPDATE
        $router->get('/edit/{id}', 'ProductController::edit');
        $router->post('/update/{id}', 'ProductController::update');

        // DELETE
        $router->get('/delete/{id}', 'ProductController::delete');
    }
);