<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts(): Product
    {
        return Product::all();
    }
}