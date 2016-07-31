<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Socursal",
 *      required={nombre, lugar, direccion},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lugar",
 *          description="lugar",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
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
class Socursal extends Model
{
    use SoftDeletes;

    /*public $table = 'socursals';*/
    protected $table = 'socursals';
   

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'lugar',
        'direccion',
        'user',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'lugar' => 'string',
        'direccion' => 'string',
          
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'lugar' => 'required',
        'direccion' => 'required'
    ];
    public function user()
    {
        /*return $this->belongsTo(User::class, 'id', 'user');*/
        return $this->belongsTo(User::class);
    }
}
