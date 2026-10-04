<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$cors_origins = [
    'http://localhost:5173',
    'http://localhost:4173',
    'https://incandescent-pavlova-7868bf.netlify.app'
];

$cors_origin = $_SERVER['HTTP_ORIGIN'] ?? '';

if (in_array($cors_origin, $cors_origins, true)) {
    header("Access-Control-Allow-Origin: $cors_origin");
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
}

$router->get('/', 'Welcome::index');

$router->get('/login', 'AuthController::login');
$router->post('/login', 'AuthController::authenticate');
$router->get('/logout', 'AuthController::logout');

$router->get('/products', 'ProductController::index')->middleware('auth');
$router->get('/products/create', 'ProductController::create')->middleware('auth');
$router->post('/products/store', 'ProductController::store')->middleware('auth');
$router->get('/products/edit/{id}', 'ProductController::edit')->middleware('auth');
$router->post('/products/update/{id}', 'ProductController::update')->middleware('auth');
$router->get('/products/delete/{id}', 'ProductController::delete')->middleware('auth');

// Migration Routes

$router->get('create-migration/{migration_class}', 'MigrationController::create_migration');

$router->get('migrate', 'MigrationController::migrate');

$router->get('rollback', 'MigrationController::rollback');

$router->get('rollback-all', 'MigrationController::rollback_all');

$router->get('refresh', 'MigrationController::refresh');

$router->get('status', 'MigrationController::status');

// API Authentication Routes

$router->post('/api/login', 'AuthApiController::login');
$router->post('/api/refresh', 'AuthApiController::refresh');
$router->post('/api/logout', 'AuthApiController::logout');

// CORS Preflight Routes

$router->options('/api/login', function() {
    if ($cors_origin && in_array($cors_origin, $cors_origins, true)) {
    header("Access-Control-Allow-Origin: $cors_origin");
}
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
    header('Access-Control-Max-Age: 3600');

    http_response_code(204);
});

$router->options('/api/refresh', function() {
    if ($cors_origin && in_array($cors_origin, $cors_origins, true)) {
    header("Access-Control-Allow-Origin: $cors_origin");
}
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
    header('Access-Control-Max-Age: 3600');

    http_response_code(204);
});

$router->options('/api/logout', function() {
    if ($cors_origin && in_array($cors_origin, $cors_origins, true)) {
    header("Access-Control-Allow-Origin: $cors_origin");
}
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
    header('Access-Control-Max-Age: 3600');

    http_response_code(204);
});


// Product API Routes

$router->get('/api/products', 'ProductApiController::index');
$router->post('/api/products', 'ProductApiController::store');
$router->put('/api/products/{id}', 'ProductApiController::update');
$router->patch('/api/products/{id}', 'ProductApiController::update');
$router->delete('/api/products/{id}', 'ProductApiController::delete');

// Product CORS Preflight Routes
$router->options('/api/products', function() {
   if ($cors_origin && in_array($cors_origin, $cors_origins, true)) {
    header("Access-Control-Allow-Origin: $cors_origin");
}
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
    header('Access-Control-Max-Age: 3600');

    http_response_code(204);
});

$router->options('/api/products/{id}', function() {
    if ($cors_origin && in_array($cors_origin, $cors_origins, true)) {
    header("Access-Control-Allow-Origin: $cors_origin");
}
    header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
    header('Access-Control-Max-Age: 3600');

    http_response_code(204);
});