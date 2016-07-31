<?php

namespace App\Repositories;

use App\Models\Vehiculo;
use InfyOm\Generator\Common\BaseRepository;

class VehiculoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'placa',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vehiculo::class;
    }
}
