<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function readProduct(Request $request, $code_bar, $name, $qtd, $price)
    {
        $parameters = [];
        if (strcmp($code_bar, "null")) $parameters['code_bar'] = $code_bar;
        if (strcmp($name, "null")) $parameters['name'] = $name;
        if (strcmp($qtd, "null")) $parameters['qtd'] = $qtd;
        if (strcmp($price, "null")) $parameters['price'] = $price;

        $result = DB::table('products')->where($parameters)->get();
        $request->session()->put('product_search_table', $result);
        return redirect()->route('main.renderCrud');
    
    }
    public function updateProduct($code_bar, $name, $qtd, $price)
    {
        DB::table('products')->where('code_bar', $code_bar)->update([
            'name' => $name,
            'qtd' => $qtd,
            'price' => $price
        ]);
        return redirect()->route('main.renderCrud');
    }
    public function deleteProduct(string $code_bar)
    {
        DB::table('products')->where('code_bar', $code_bar)->delete();
        return redirect()->route('main.renderCrud');
    }
}
