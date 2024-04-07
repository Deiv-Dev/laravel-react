<?php

namespace App\Http\Controllers;

use \App\Models\Product;
use Illuminate\Support\Collection;
use Psr\Log\LoggerInterface;


class ShowAllProductService
{
    public function showAllProduct(): Collection
    {
        $logger = app(LoggerInterface::class);
        $logger->info('new log');
        return Product::all();
    }
}