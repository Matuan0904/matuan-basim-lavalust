<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('ProductModel');
    }

    /*
    |--------------------------------------------------------------------------
    | READ - Display Products
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $products = $this->ProductModel->all();

        $this->call->view('products/index', [
            'products' => $products
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE - Show Form
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $this->call->view('products/create');
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE - Store Product
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        $product_name = trim($this->io->post('product_name'));
        $description  = trim($this->io->post('description'));
        $price        = $this->io->post('price');
        $quantity     = $this->io->post('quantity');

        // Basic validation
        if (
            empty($product_name) ||
            $price === '' ||
            $quantity === ''
        ) {
            redirect('/products/create');
            return;
        }

        if (!is_numeric($price) || $price < 0) {
            redirect('/products/create');
            return;
        }

        if (!is_numeric($quantity) || $quantity < 0) {
            redirect('/products/create');
            return;
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity
        ];

        $this->ProductModel->insert($data);

        redirect('/products');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE - Show Edit Form
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $id = (int) $id;

        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('/products');
            return;
        }

        $this->call->view('products/edit', [
            'product' => $product
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE - Save Changes
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        $id = (int) $id;

        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('/products');
            return;
        }

        $product_name = trim($this->io->post('product_name'));
        $description  = trim($this->io->post('description'));
        $price        = $this->io->post('price');
        $quantity     = $this->io->post('quantity');

        if (
            empty($product_name) ||
            $price === '' ||
            $quantity === ''
        ) {
            redirect('/products/edit/' . $id);
            return;
        }

        if (!is_numeric($price) || $price < 0) {
            redirect('/products/edit/' . $id);
            return;
        }

        if (!is_numeric($quantity) || $quantity < 0) {
            redirect('/products/edit/' . $id);
            return;
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity
        ];

        $this->ProductModel->update($id, $data);

        redirect('/products');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        $id = (int) $id;

        $product = $this->ProductModel->find($id);

        if ($product) {
            $this->ProductModel->delete($id);
        }

        redirect('/products');
    }
}