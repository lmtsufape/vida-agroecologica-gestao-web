<?php

namespace App\Http\Controllers;

use App\Models\Associacao;
use App\Models\Contato;
use Illuminate\Http\Request;

class AssociacaoController extends Controller
{

    public function create(Request $request){
        $associacao = new Associacao();
        $contato = new Contato();

        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->save();

        $associacao->nome = $request->nome;
        $associacao->codigo = $request->codigo;
        $associacao->user_id = $request->presidente;
        $associacao->contato_id = $contato->id;
        $associacao->save();

        return redirect(route('associacoes.index'));
    }

}
