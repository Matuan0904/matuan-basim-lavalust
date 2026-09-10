<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductModel extends Model
{
    protected $table = 'products';

    protected $primary_key = 'id';

    protected $fillable = [
        'product_name',
        'description',
        'price',
        'quantity'
    ];

    /*
     * The assignment only requires created_at.
     * We will let MySQL handle the timestamp.
     */
    protected $timestamps = false;
}