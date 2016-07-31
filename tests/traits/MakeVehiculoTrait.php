<?php

use Faker\Factory as Faker;
use App\Models\Vehiculo;
use App\Repositories\VehiculoRepository;

trait MakeVehiculoTrait
{
    /**
     * Create fake instance of Vehiculo and save it in database
     *
     * @param array $vehiculoFields
     * @return Vehiculo
     */
    public function makeVehiculo($vehiculoFields = [])
    {
        /** @var VehiculoRepository $vehiculoRepo */
        $vehiculoRepo = App::make(VehiculoRepository::class);
        $theme = $this->fakeVehiculoData($vehiculoFields);
        return $vehiculoRepo->create($theme);
    }

    /**
     * Get fake instance of Vehiculo
     *
     * @param array $vehiculoFields
     * @return Vehiculo
     */
    public function fakeVehiculo($vehiculoFields = [])
    {
        return new Vehiculo($this->fakeVehiculoData($vehiculoFields));
    }

    /**
     * Get fake data of Vehiculo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVehiculoData($vehiculoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'placa' => $fake->word,
            'fecha_registro' => $fake->word,
            'tipo' => $fake->word,
            'descripcion' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $vehiculoFields);
    }
}
