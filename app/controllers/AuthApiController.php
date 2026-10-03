<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthApiController extends Controller
{
    protected $api;

    public function __construct()
    {
        parent::__construct();

        // Initialize database so the Api library can use $lava->db
        $this->call->database();

        // Load LavaLust API library
        $this->api = load_class('Api', 'libraries');
    }

    public function login()
    {
        $this->api->require_method('POST');

        $data = $this->api->body();

        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        // Lab 5 demo credentials
        if ($username !== 'admin' || $password !== 'admin123') {
            $this->api->respond_error('Invalid username or password.', 401);
        }

        $tokens = $this->api->issue_tokens([
            'id' => 1,
            'role' => 'admin',
            'scopes' => ['read', 'create', 'update', 'delete']
        ]);

        $this->api->respond([
            'success' => true,
            'message' => 'Login successful.',
            'user' => [
                'id' => 1,
                'username' => 'admin',
                'role' => 'admin'
            ],
            'tokens' => $tokens
        ]);
    }

    public function refresh()
    {
        $this->api->require_method('POST');

        $data = $this->api->body();

        if (empty($data['refresh_token'])) {
            $this->api->respond_error('Refresh token is required.', 422);
        }

        $this->api->refresh_access_token($data['refresh_token']);
    }

    public function logout()
    {
        $this->api->require_method('POST');

        $data = $this->api->body();

        if (!empty($data['refresh_token'])) {
            $this->api->revoke_refresh_token($data['refresh_token']);
        }

        $this->api->respond([
            'success' => true,
            'message' => 'Logout successful.'
        ]);
    }
}