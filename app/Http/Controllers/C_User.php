<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_User extends Controller
{
    public function login(Request $request)
    {
        // Pesquisando Usuário
        $user = DB::table('users')->where('name', $request->name)->first();
        // Verificando senha
        if ($user != null && $user->password == $request->password) {
            $request->session()->put('user_logged', true);
            return redirect()->route('main.renderCrud');
        } else {
            return redirect()->route('main.renderInicial');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user_logged');
        return redirect()->route('main.renderInicial');
    }
    public function createUser(Request $request)
    {
        // Criando Instância de Usuário e Salvando no Banco
        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('main.renderInicial');
    }
}
