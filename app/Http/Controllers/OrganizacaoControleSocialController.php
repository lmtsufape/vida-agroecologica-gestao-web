<?php

namespace App\Http\Controllers;

use App\Models\Associacao;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\OrganizacaoControleSocial;
use Illuminate\Http\Request;

class OrganizacaoControleSocialController extends Controller
{

    public function index($associacao_id){
        $lista_ocs = OrganizacaoControleSocial::where('associacao_id',$associacao_id)->get();
        $associacao = Associacao::find($associacao_id);

        return view('organizacaoControleSocial.index', compact('lista_ocs', 'associacao'));
    }


}
