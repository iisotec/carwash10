<?php

use App\Models\Vehiculo;
use App\Repositories\VehiculoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehiculoRepositoryTest extends TestCase
{
    use MakeVehiculoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VehiculoRepository
     */
    protected $vehiculoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->vehiculoRepo = App::make(VehiculoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVehiculo()
    {
        $vehiculo = $this->fakeVehiculoData();
        $createdVehiculo = $this->vehiculoRepo->create($vehiculo);
        $createdVehiculo = $createdVehiculo->toArray();
        $this->assertArrayHasKey('id', $createdVehiculo);
        $this->assertNotNull($createdVehiculo['id'], 'Created Vehiculo must have id specified');
        $this->assertNotNull(Vehiculo::find($createdVehiculo['id']), 'Vehiculo with given id must be in DB');
        $this->assertModelData($vehiculo, $createdVehiculo);
    }

    /**
     * @test read
     */
    public function testReadVehiculo()
    {
        $vehiculo = $this->makeVehiculo();
        $dbVehiculo = $this->vehiculoRepo->find($vehiculo->id);
        $dbVehiculo = $dbVehiculo->toArray();
        $this->assertModelData($vehiculo->toArray(), $dbVehiculo);
    }

    /**
     * @test update
     */
    public function testUpdateVehiculo()
    {
        $vehiculo = $this->makeVehiculo();
        $fakeVehiculo = $this->fakeVehiculoData();
        $updatedVehiculo = $this->vehiculoRepo->update($fakeVehiculo, $vehiculo->id);
        $this->assertModelData($fakeVehiculo, $updatedVehiculo->toArray());
        $dbVehiculo = $this->vehiculoRepo->find($vehiculo->id);
        $this->assertModelData($fakeVehiculo, $dbVehiculo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVehiculo()
    {
        $vehiculo = $this->makeVehiculo();
        $resp = $this->vehiculoRepo->delete($vehiculo->id);
        $this->assertTrue($resp);
        $this->assertNull(Vehiculo::find($vehiculo->id), 'Vehiculo should not exist in DB');
    }
}
