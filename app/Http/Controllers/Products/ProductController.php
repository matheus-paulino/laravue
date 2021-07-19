<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Stock\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::select(['id', 'name', 'price', 'status'])->get();

        $data = [
            'products' => $products
        ];

        return Inertia::render('Product/Index', $data);
    }

    public function create()
    {
        $stocks = Stock::select(['id', 'name'])->get();

        $data = [
            'stocks' => $stocks
        ];

        return Inertia::render('Product/Create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();


        dd($request);
    }
}
