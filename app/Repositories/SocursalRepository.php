<?php

namespace App\Repositories;

use App\Models\Socursal;
use InfyOm\Generator\Common\BaseRepository;

class SocursalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'lugar'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Socursal::class;
    }
}
