<?php

use App\Models\Socursal;
use App\Repositories\SocursalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SocursalRepositoryTest extends TestCase
{
    use MakeSocursalTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SocursalRepository
     */
    protected $socursalRepo;

    public function setUp()
    {
        parent::setUp();
        $this->socursalRepo = App::make(SocursalRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSocursal()
    {
        $socursal = $this->fakeSocursalData();
        $createdSocursal = $this->socursalRepo->create($socursal);
        $createdSocursal = $createdSocursal->toArray();
        $this->assertArrayHasKey('id', $createdSocursal);
        $this->assertNotNull($createdSocursal['id'], 'Created Socursal must have id specified');
        $this->assertNotNull(Socursal::find($createdSocursal['id']), 'Socursal with given id must be in DB');
        $this->assertModelData($socursal, $createdSocursal);
    }

    /**
     * @test read
     */
    public function testReadSocursal()
    {
        $socursal = $this->makeSocursal();
        $dbSocursal = $this->socursalRepo->find($socursal->id);
        $dbSocursal = $dbSocursal->toArray();
        $this->assertModelData($socursal->toArray(), $dbSocursal);
    }

    /**
     * @test update
     */
    public function testUpdateSocursal()
    {
        $socursal = $this->makeSocursal();
        $fakeSocursal = $this->fakeSocursalData();
        $updatedSocursal = $this->socursalRepo->update($fakeSocursal, $socursal->id);
        $this->assertModelData($fakeSocursal, $updatedSocursal->toArray());
        $dbSocursal = $this->socursalRepo->find($socursal->id);
        $this->assertModelData($fakeSocursal, $dbSocursal->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSocursal()
    {
        $socursal = $this->makeSocursal();
        $resp = $this->socursalRepo->delete($socursal->id);
        $this->assertTrue($resp);
        $this->assertNull(Socursal::find($socursal->id), 'Socursal should not exist in DB');
    }
}
