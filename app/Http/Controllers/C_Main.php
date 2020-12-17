<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return view('v_crud');
        } else {
            return redirect()->route('main.renderInicial');
        }
    }
}
