<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Main extends Controller
{
    public function renderInicialPage(Request $request)
    {
        if ($request->session()->exists('user_logged')) {
            return redirect()->route('main.renderCrud');
        } else {
            return view('v_inicial');
        }
    }
    public function renderCrudPage(Request $request)
    {
        if ($request->session()->has('user_logged')) {
            // Pesquisando registro de produtos no banco
            if ($request->session()->has('product_search_table')) {
                $request->session()->get('product_search_table');
                $product_regs = $request->session()->get('product_search_table');
                $request->session()->forget('product_search_table');
            } else {
                $product_regs = DB::table('products')->get();
            }
            return view('v_crud', ['product_regs' => $product_regs]);
        } else {
            return redirect()->route('main.renderInicial');
        }
    }
}
