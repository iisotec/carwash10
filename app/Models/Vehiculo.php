<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Vehiculo",
 *      required={placa},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="placa",
 *          description="placa",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fecha_registro",
 *          description="fecha_registro",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Vehiculo extends Model
{
    use SoftDeletes;

    /*public $table = 'vehiculos';*/
    protected $table = 'vehiculos';
    
    protected $dates = ['deleted_at'];


    public $fillable = [
        'placa',
        'fecha_registro',
        'tipo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'placa' => 'string',
        'tipo' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'placa' => 'required'
    ];

    public function lavados()
    {
            return $this->hasMany('App\Models\Lavado');
    }
/*
    public function scopeName($query, $name)
    {
        
        $query->where('placa', $name);
        dd('SCOPE:'. $valor);

    }*/
}
