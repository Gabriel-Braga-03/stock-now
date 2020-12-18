<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class C_Product extends Controller
{
    public function createProduct(Request $request)
    {
        // Instanciando novo poduto e Salvando no Banco
        $product = new Product();
        $product->code_bar = $request->code_bar;
        $product->name = $request->name;
        $product->qtd = $request->qtd;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('main.renderCrud');
    }
}
