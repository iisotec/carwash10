<?php

use Faker\Factory as Faker;
use App\Models\Socursal;
use App\Repositories\SocursalRepository;

trait MakeSocursalTrait
{
    /**
     * Create fake instance of Socursal and save it in database
     *
     * @param array $socursalFields
     * @return Socursal
     */
    public function makeSocursal($socursalFields = [])
    {
        /** @var SocursalRepository $socursalRepo */
        $socursalRepo = App::make(SocursalRepository::class);
        $theme = $this->fakeSocursalData($socursalFields);
        return $socursalRepo->create($theme);
    }

    /**
     * Get fake instance of Socursal
     *
     * @param array $socursalFields
     * @return Socursal
     */
    public function fakeSocursal($socursalFields = [])
    {
        return new Socursal($this->fakeSocursalData($socursalFields));
    }

    /**
     * Get fake data of Socursal
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSocursalData($socursalFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'lugar' => $fake->word,
            'direccion' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $socursalFields);
    }
}
