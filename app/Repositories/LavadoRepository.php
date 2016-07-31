<?php

namespace App\Repositories;

use App\Models\Lavado;
use InfyOm\Generator\Common\BaseRepository;

class LavadoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lavado::class;
    }
}
