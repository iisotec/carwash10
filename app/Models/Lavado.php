<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Lavado",
 *      required={precio, fecha_lavado},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="precio",
 *          description="precio",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fecha_lavado",
 *          description="fecha_lavado",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="estado_lavado",
 *          description="estado_lavado",
 *          type="boolean"
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
class Lavado extends Model
{
    use SoftDeletes;

    /*public $table = 'lavados';*/
    protected $table = 'lavados';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'precio',
        'fecha_lavado',
        'user',
        'vehiculo',
        'estado_lavado',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'precio' => 'integer',
        'fecha_lavado'=>'timestamp',
        'estado_lavado' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'precio' => 'required',
    ];

    public function vehiculo()
    {
        return $this->belongsTo('\App\Models\Vehiculo');
    }
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
