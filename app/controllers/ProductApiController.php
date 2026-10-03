<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductApiController extends Controller
{
    protected $api;
    protected $db;

   public function __construct()
    {
        parent::__construct();

        // Initialize and get the database instance
        $this->db = $this->call->database();

        // Load LavaLust API library
        $this->api = load_class('Api', 'libraries');
    }

    /*
    |--------------------------------------------------------------------------
    | GET /api/products
    |--------------------------------------------------------------------------
    | Display all products
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $this->api->require_jwt();
        $this->api->require_method('GET');

        $products = $this->db->table('products')
            ->get_all();

        $this->api->respond([
            'success' => true,
            'data' => $products
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | POST /api/products
    |--------------------------------------------------------------------------
    | Add product
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        $this->api->require_jwt();
        $this->api->require_method('POST');

        $data = $this->api->body();

        if (
            empty($data['product_name']) ||
            !isset($data['price']) ||
            !isset($data['quantity'])
        ) {
            $this->api->respond_error(
                'Product name, price, and quantity are required.',
                422
            );
        }

        $product = [
            'product_name' => $data['product_name'],
            'description'  => $data['description'] ?? '',
            'price'        => $data['price'],
            'quantity'     => $data['quantity']
        ];

        $this->db->table('products')->insert($product);

        $this->api->respond([
            'success' => true,
            'message' => 'Product added successfully.'
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | PUT/PATCH /api/products/{id}
    |--------------------------------------------------------------------------
    | Update product
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        $this->api->require_jwt();

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method !== 'PUT' && $method !== 'PATCH') {
            $this->api->respond_error('Method Not Allowed', 405);
        }

        $product = $this->db->table('products')
            ->where('id', $id)
            ->get();

        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $data = $this->api->body();

        $update = [];

        if (isset($data['product_name'])) {
            $update['product_name'] = $data['product_name'];
        }

        if (isset($data['description'])) {
            $update['description'] = $data['description'];
        }

        if (isset($data['price'])) {
            $update['price'] = $data['price'];
        }

        if (isset($data['quantity'])) {
            $update['quantity'] = $data['quantity'];
        }

        if (empty($update)) {
            $this->api->respond_error(
                'No product data provided.',
                422
            );
        }

        $this->db->table('products')
            ->where('id', $id)
            ->update($update);

        $this->api->respond([
            'success' => true,
            'message' => 'Product updated successfully.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE /api/products/{id}
    |--------------------------------------------------------------------------
    | Delete product
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        $this->api->require_jwt();
        $this->api->require_method('DELETE');

        $product = $this->db->table('products')
            ->where('id', $id)
            ->get();

        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->db->table('products')
            ->where('id', $id)
            ->delete();

        $this->api->respond([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ]);
    }
}