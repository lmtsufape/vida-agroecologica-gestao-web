<?php

namespace App\Http\Controllers;

use App\Models\Associacao;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function usuarios_index(){
        $users = User::all();
        return view('admin.usuarios_index', compact('users'));
    }

    public function associacoes_index()
    {
        $associacoes = Associacao::all();
        $presidentes = User::where('tipo_usuario_id', 2)->get();
        return view('admin.associacoes_index', compact('associacoes', 'presidentes'));
    }

    public function usuario_store(Request $request)
    {
        $usuario = new User();
        $contato = new Contato();
        $endereco = new Endereco();

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo_usuario_id = $request->tipo;

        $contato->email = $request->email;
        $contato->telefone = $request->telefone;

        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->cep = $request->cep;

        $contato->save();
        $endereco->save();
        $usuario->save();

        return redirect(route('usuarios.index'));
    }
}
