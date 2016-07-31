<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LavadoApiTest extends TestCase
{
    use MakeLavadoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLavado()
    {
        $lavado = $this->fakeLavadoData();
        $this->json('POST', '/api/v1/lavados', $lavado);

        $this->assertApiResponse($lavado);
    }

    /**
     * @test
     */
    public function testReadLavado()
    {
        $lavado = $this->makeLavado();
        $this->json('GET', '/api/v1/lavados/'.$lavado->id);

        $this->assertApiResponse($lavado->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLavado()
    {
        $lavado = $this->makeLavado();
        $editedLavado = $this->fakeLavadoData();

        $this->json('PUT', '/api/v1/lavados/'.$lavado->id, $editedLavado);

        $this->assertApiResponse($editedLavado);
    }

    /**
     * @test
     */
    public function testDeleteLavado()
    {
        $lavado = $this->makeLavado();
        $this->json('DELETE', '/api/v1/lavados/'.$lavado->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lavados/'.$lavado->id);

        $this->assertResponseStatus(404);
    }
}
