<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Service\Product\ShowProductService;
use Psr\Log\LoggerInterface;


class ProductController extends Controller
{
    private $showProductService;
    private $logger;

    public function __construct(ShowProductService $showProductService, LoggerInterface $logger)
    {
        $this->showProductService = $showProductService;
        $this->logger = $logger;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $product = $this->showProductService->showAllProduct();
            return response()->json($product);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage() . " on line " . $e->getLine());
            return response()->json(['error' => 'fetching products']);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
