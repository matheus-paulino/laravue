<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stock\ProductRequest;
use App\Models\Stock\Stock;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::select(['id', 'name', 'type'])->get();


        return Inertia::render('Stock/Index', [
            'stocks' => $stocks
        ]);
    }

    public function create()
    {
        return Inertia::render('Stock/Create');
    }

    /**
     * Há uma seguinte regra quando o estoque for do tipo Master(Estoque principal)
     * Pode haver somente UM estoque Master.
     * Somente o Administrador poderá adicionar novos estoques
     * 
     * TODO: implement prevent have one more master stock
     * TODO: implement only admin role add new stock
     * 
     */

    public function store(Request $request)
    {
        $data = $request->all();

        if (!$data['type']) {
            $data['type'] = 'simple';
        } else {
            $data['type'] = 'master';
        }

        Stock::create($data);

        return Redirect::route('admin.stock.index');
    }

    public function show($id)
    {
        try {

            $stock = Stock::findOrFail($id);

            return Inertia::render('Stock/Show', [
                'stock' => $stock
            ]);

        } catch (ModelNotFoundException $exception) {
            return Redirect::route('admin.stock.index');
        }

        return Inertia::render('Stock/Show');
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
