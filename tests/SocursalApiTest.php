<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocursalApiTest extends TestCase
{
    use MakeSocursalTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSocursal()
    {
        $socursal = $this->fakeSocursalData();
        $this->json('POST', '/api/v1/socursals', $socursal);

        $this->assertApiResponse($socursal);
    }

    /**
     * @test
     */
    public function testReadSocursal()
    {
        $socursal = $this->makeSocursal();
        $this->json('GET', '/api/v1/socursals/'.$socursal->id);

        $this->assertApiResponse($socursal->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSocursal()
    {
        $socursal = $this->makeSocursal();
        $editedSocursal = $this->fakeSocursalData();

        $this->json('PUT', '/api/v1/socursals/'.$socursal->id, $editedSocursal);

        $this->assertApiResponse($editedSocursal);
    }

    /**
     * @test
     */
    public function testDeleteSocursal()
    {
        $socursal = $this->makeSocursal();
        $this->json('DELETE', '/api/v1/socursals/'.$socursal->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/socursals/'.$socursal->id);

        $this->assertResponseStatus(404);
    }
}
