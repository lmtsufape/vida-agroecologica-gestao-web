<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associacao extends Model
{
    use HasFactory;

    public function organizacaoControleSocials(){
        return $this->hasMany('App\Models\OrganizacaoControleSocial');
    }

    public function contato(){
        return $this->belongsTo('App\Models\Contato');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
