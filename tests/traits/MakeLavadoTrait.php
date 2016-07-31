<?php

use Faker\Factory as Faker;
use App\Models\Lavado;
use App\Repositories\LavadoRepository;

trait MakeLavadoTrait
{
    /**
     * Create fake instance of Lavado and save it in database
     *
     * @param array $lavadoFields
     * @return Lavado
     */
    public function makeLavado($lavadoFields = [])
    {
        /** @var LavadoRepository $lavadoRepo */
        $lavadoRepo = App::make(LavadoRepository::class);
        $theme = $this->fakeLavadoData($lavadoFields);
        return $lavadoRepo->create($theme);
    }

    /**
     * Get fake instance of Lavado
     *
     * @param array $lavadoFields
     * @return Lavado
     */
    public function fakeLavado($lavadoFields = [])
    {
        return new Lavado($this->fakeLavadoData($lavadoFields));
    }

    /**
     * Get fake data of Lavado
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLavadoData($lavadoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'precio' => $fake->randomDigitNotNull,
            'fecha_lavado' => $fake->word,
            'estado_lavado' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $lavadoFields);
    }
}
