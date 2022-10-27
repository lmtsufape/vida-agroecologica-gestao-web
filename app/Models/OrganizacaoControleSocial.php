<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizacaoControleSocial extends Model
{
    use HasFactory;

    public function endereco(){
        return $this->belongsTo('App\Models\Endereco');
    }

    public function contato(){
        return $this->belongsTo('App\Models\Contato');
    }

    public function associacao(){
        return $this->belongsTo('App\Models\Associacao');
    }
}
