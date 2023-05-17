<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'tipo_usuario_id',
        "endereco_id",
        "contato_id"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipoUsuario(){
        return $this->belongsTo('App\Models\TipoUsuario');
    }

    public function endereco(){
        return $this->belongsTo('App\Models\Endereco');
    }

    public function contato(){
        return $this->belongsTo('App\Models\Contato');
    }

    public function propriedades(){
        return $this->hasMany('App\Models\Propriedade');
    }

    public function associacaoes(){
        return $this->hasMany('App\Models\Associacao');
    }

    public function organizacao() {
        return $this->belongsTo(OrganizacaoControleSocial::class, "organizacao_controle_social_id");
    }
}
