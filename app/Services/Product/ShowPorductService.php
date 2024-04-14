<?php

namespace App\Service\Product;

use \App\Models\Product;
use Illuminate\Support\Collection;
use Psr\Log\LoggerInterface;


class ShowProductService
{
    public function showAllProduct(): Collection
    {
        $logger = app(LoggerInterface::class);
        $logger->info('new log');
        return Product::all();
    }
}