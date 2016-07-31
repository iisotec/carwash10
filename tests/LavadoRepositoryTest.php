<?php

use App\Models\Lavado;
use App\Repositories\LavadoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LavadoRepositoryTest extends TestCase
{
    use MakeLavadoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LavadoRepository
     */
    protected $lavadoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lavadoRepo = App::make(LavadoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLavado()
    {
        $lavado = $this->fakeLavadoData();
        $createdLavado = $this->lavadoRepo->create($lavado);
        $createdLavado = $createdLavado->toArray();
        $this->assertArrayHasKey('id', $createdLavado);
        $this->assertNotNull($createdLavado['id'], 'Created Lavado must have id specified');
        $this->assertNotNull(Lavado::find($createdLavado['id']), 'Lavado with given id must be in DB');
        $this->assertModelData($lavado, $createdLavado);
    }

    /**
     * @test read
     */
    public function testReadLavado()
    {
        $lavado = $this->makeLavado();
        $dbLavado = $this->lavadoRepo->find($lavado->id);
        $dbLavado = $dbLavado->toArray();
        $this->assertModelData($lavado->toArray(), $dbLavado);
    }

    /**
     * @test update
     */
    public function testUpdateLavado()
    {
        $lavado = $this->makeLavado();
        $fakeLavado = $this->fakeLavadoData();
        $updatedLavado = $this->lavadoRepo->update($fakeLavado, $lavado->id);
        $this->assertModelData($fakeLavado, $updatedLavado->toArray());
        $dbLavado = $this->lavadoRepo->find($lavado->id);
        $this->assertModelData($fakeLavado, $dbLavado->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLavado()
    {
        $lavado = $this->makeLavado();
        $resp = $this->lavadoRepo->delete($lavado->id);
        $this->assertTrue($resp);
        $this->assertNull(Lavado::find($lavado->id), 'Lavado should not exist in DB');
    }
}
