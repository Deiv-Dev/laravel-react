<?php

namespace App\Service\Product;

use \App\Models\Product;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Psr\SimpleCache\CacheInterface;
use App\Repository\ProductRepository;

class ShowProductService
{
    const CACHE_ALL_PRODUCTS = "all_products";
    const CACHE_TIME = 3600;
    private $cache;
    private $productRepository;

    public function __construct(CacheInterface $cache, ProductRepository $productRepository)
    {
        $this->cache = $cache;
        $this->productRepository = $productRepository;
    }

    public function showAllProduct(): JsonResponse
    {
        $products = $this->retrieveProducts();
        if ($products->isEmpty()) {
            return response()->json("Product not found", Response::HTTP_NOT_FOUND);
        } else {
            return response()->json($products, Response::HTTP_NOT_FOUND);
        }
    }

    public function retrieveProducts(): Product
    {
        if ($this->cache->has(self::CACHE_ALL_PRODUCTS)) {
            return $this->cache->get(self::CACHE_ALL_PRODUCTS);
        }

        $products = $this->productRepository->getAllProducts();
        $this->cache->set(self::CACHE_ALL_PRODUCTS, $products, self::CACHE_TIME);
        return $products;
    }
}