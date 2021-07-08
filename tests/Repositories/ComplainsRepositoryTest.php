<?php namespace Tests\Repositories;

use App\Models\Complains;
use App\Repositories\ComplainsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComplainsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComplainsRepository
     */
    protected $complainsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->complainsRepo = \App::make(ComplainsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_complains()
    {
        $complains = factory(Complains::class)->make()->toArray();

        $createdComplains = $this->complainsRepo->create($complains);

        $createdComplains = $createdComplains->toArray();
        $this->assertArrayHasKey('id', $createdComplains);
        $this->assertNotNull($createdComplains['id'], 'Created Complains must have id specified');
        $this->assertNotNull(Complains::find($createdComplains['id']), 'Complains with given id must be in DB');
        $this->assertModelData($complains, $createdComplains);
    }

    /**
     * @test read
     */
    public function test_read_complains()
    {
        $complains = factory(Complains::class)->create();

        $dbComplains = $this->complainsRepo->find($complains->id);

        $dbComplains = $dbComplains->toArray();
        $this->assertModelData($complains->toArray(), $dbComplains);
    }

    /**
     * @test update
     */
    public function test_update_complains()
    {
        $complains = factory(Complains::class)->create();
        $fakeComplains = factory(Complains::class)->make()->toArray();

        $updatedComplains = $this->complainsRepo->update($fakeComplains, $complains->id);

        $this->assertModelData($fakeComplains, $updatedComplains->toArray());
        $dbComplains = $this->complainsRepo->find($complains->id);
        $this->assertModelData($fakeComplains, $dbComplains->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_complains()
    {
        $complains = factory(Complains::class)->create();

        $resp = $this->complainsRepo->delete($complains->id);

        $this->assertTrue($resp);
        $this->assertNull(Complains::find($complains->id), 'Complains should not exist in DB');
    }
}
