<?php namespace Tests\Repositories;

use App\Models\Suburb;
use App\Repositories\SuburbRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SuburbRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SuburbRepository
     */
    protected $suburbRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->suburbRepo = \App::make(SuburbRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_suburb()
    {
        $suburb = factory(Suburb::class)->make()->toArray();

        $createdSuburb = $this->suburbRepo->create($suburb);

        $createdSuburb = $createdSuburb->toArray();
        $this->assertArrayHasKey('id', $createdSuburb);
        $this->assertNotNull($createdSuburb['id'], 'Created Suburb must have id specified');
        $this->assertNotNull(Suburb::find($createdSuburb['id']), 'Suburb with given id must be in DB');
        $this->assertModelData($suburb, $createdSuburb);
    }

    /**
     * @test read
     */
    public function test_read_suburb()
    {
        $suburb = factory(Suburb::class)->create();

        $dbSuburb = $this->suburbRepo->find($suburb->id);

        $dbSuburb = $dbSuburb->toArray();
        $this->assertModelData($suburb->toArray(), $dbSuburb);
    }

    /**
     * @test update
     */
    public function test_update_suburb()
    {
        $suburb = factory(Suburb::class)->create();
        $fakeSuburb = factory(Suburb::class)->make()->toArray();

        $updatedSuburb = $this->suburbRepo->update($fakeSuburb, $suburb->id);

        $this->assertModelData($fakeSuburb, $updatedSuburb->toArray());
        $dbSuburb = $this->suburbRepo->find($suburb->id);
        $this->assertModelData($fakeSuburb, $dbSuburb->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_suburb()
    {
        $suburb = factory(Suburb::class)->create();

        $resp = $this->suburbRepo->delete($suburb->id);

        $this->assertTrue($resp);
        $this->assertNull(Suburb::find($suburb->id), 'Suburb should not exist in DB');
    }
}
