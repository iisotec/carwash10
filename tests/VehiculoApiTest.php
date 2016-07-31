<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiculoApiTest extends TestCase
{
    use MakeVehiculoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVehiculo()
    {
        $vehiculo = $this->fakeVehiculoData();
        $this->json('POST', '/api/v1/vehiculos', $vehiculo);

        $this->assertApiResponse($vehiculo);
    }

    /**
     * @test
     */
    public function testReadVehiculo()
    {
        $vehiculo = $this->makeVehiculo();
        $this->json('GET', '/api/v1/vehiculos/'.$vehiculo->id);

        $this->assertApiResponse($vehiculo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVehiculo()
    {
        $vehiculo = $this->makeVehiculo();
        $editedVehiculo = $this->fakeVehiculoData();

        $this->json('PUT', '/api/v1/vehiculos/'.$vehiculo->id, $editedVehiculo);

        $this->assertApiResponse($editedVehiculo);
    }

    /**
     * @test
     */
    public function testDeleteVehiculo()
    {
        $vehiculo = $this->makeVehiculo();
        $this->json('DELETE', '/api/v1/vehiculos/'.$vehiculo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/vehiculos/'.$vehiculo->id);

        $this->assertResponseStatus(404);
    }
}
