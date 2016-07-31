<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name', 'apellidos', 'email', 'password', 'tipo_usuario', 'dni', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function socursal(){
        return $this->hasOne('App\Models\Socursal');
    }

    public function lavados(){
        return $this->hasMany('App\Models\Lavado');
    }

}
