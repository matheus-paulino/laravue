<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stock\ProductRequest;
use App\Models\Stock\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    public function index()
    {
        // TODO: create view index
    }

    public function create()
    {
        // TODO: create view create
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        Product::create($data);

        return Redirect::route('dashboard');
    }

    public function edit($id)
    {
        // TODO: create view edit
    }

    public function update()
    {
        // TODO: implement update product
    }

    public function destroy()
    {
        // TODO: implement destroy product
    }
}
