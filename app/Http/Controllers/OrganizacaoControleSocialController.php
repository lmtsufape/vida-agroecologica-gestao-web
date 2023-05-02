<?php

namespace App\Http\Controllers;

use App\Models\Associacao;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\OrganizacaoControleSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizacaoControleSocialController extends Controller
{

    public function index($associacao_id){
        $lista_ocs = OrganizacaoControleSocial::where('associacao_id',$associacao_id)->get();
        $associacao = Associacao::find($associacao_id);

        return view('organizacaoControleSocial.index', compact('lista_ocs', 'associacao'));
    }

    public function store(Request $request){
        $ocs = new OrganizacaoControleSocial();
        $contato = new Contato();
        $endereco = new Endereco();

        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->save();

        $endereco->pais = $request->pais;
        $endereco->uf = $request->uf;
        $endereco->cidade = $request->cidade;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->save();

        $ocs->nome = $request->nome;
        $ocs->representante = $request->representante;
        $ocs->cnpj = $request->cnpj;
        $ocs->data_fundacao = $request->data_fundacao;
        $ocs->contato_id = $contato->id;
        $ocs->endereco_id = $endereco->id;
        $ocs->associacao_id = $request->associacao_id;
        $ocs->save();

        return redirect(route('ocs.index',['associacao_id' => $request->associacao_id]));
    }

    public function update(Request $request){
        $ocs = OrganizacaoControleSocial::find($request->ocs_id);
        $contato = $ocs->contato;
        $endereco = $ocs->endereco;

        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->update();

        $endereco->pais = $request->pais;
        $endereco->uf = $request->uf;
        $endereco->cidade = $request->cidade;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->update();

        $ocs->nome = $request->nome;
        $ocs->representante = $request->representante;
        $ocs->cnpj = $request->cnpj;
        $ocs->data_fundacao = $request->data_fundacao;
        $ocs->update();

        return redirect(route('ocs.index',['associacao_id' => $ocs->associacao_id]));
    }

    public function show()
    {
        //fazer um join para pegar todos os usuario d euma ocs
        $usuarios = DB::table('users');
    }
}
