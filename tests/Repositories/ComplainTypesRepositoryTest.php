<?php namespace Tests\Repositories;

use App\Models\ComplainTypes;
use App\Repositories\ComplainTypesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ComplainTypesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComplainTypesRepository
     */
    protected $complainTypesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->complainTypesRepo = \App::make(ComplainTypesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->make()->toArray();

        $createdComplainTypes = $this->complainTypesRepo->create($complainTypes);

        $createdComplainTypes = $createdComplainTypes->toArray();
        $this->assertArrayHasKey('id', $createdComplainTypes);
        $this->assertNotNull($createdComplainTypes['id'], 'Created ComplainTypes must have id specified');
        $this->assertNotNull(ComplainTypes::find($createdComplainTypes['id']), 'ComplainTypes with given id must be in DB');
        $this->assertModelData($complainTypes, $createdComplainTypes);
    }

    /**
     * @test read
     */
    public function test_read_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->create();

        $dbComplainTypes = $this->complainTypesRepo->find($complainTypes->id);

        $dbComplainTypes = $dbComplainTypes->toArray();
        $this->assertModelData($complainTypes->toArray(), $dbComplainTypes);
    }

    /**
     * @test update
     */
    public function test_update_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->create();
        $fakeComplainTypes = factory(ComplainTypes::class)->make()->toArray();

        $updatedComplainTypes = $this->complainTypesRepo->update($fakeComplainTypes, $complainTypes->id);

        $this->assertModelData($fakeComplainTypes, $updatedComplainTypes->toArray());
        $dbComplainTypes = $this->complainTypesRepo->find($complainTypes->id);
        $this->assertModelData($fakeComplainTypes, $dbComplainTypes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->create();

        $resp = $this->complainTypesRepo->delete($complainTypes->id);

        $this->assertTrue($resp);
        $this->assertNull(ComplainTypes::find($complainTypes->id), 'ComplainTypes should not exist in DB');
    }
}
