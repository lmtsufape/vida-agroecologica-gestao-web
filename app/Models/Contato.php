<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function organizacaoControleSocial(){
        return $this->hasOne('App\Models\OrganizacaoControleSocial');
    }

    public function associacao(){
        return $this->hasOne('App\Models\Associacao');
    }
}
