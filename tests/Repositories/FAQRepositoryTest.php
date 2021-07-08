<?php namespace Tests\Repositories;

use App\Models\FAQ;
use App\Repositories\FAQRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FAQRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FAQRepository
     */
    protected $fAQRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fAQRepo = \App::make(FAQRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_f_a_q()
    {
        $fAQ = factory(FAQ::class)->make()->toArray();

        $createdFAQ = $this->fAQRepo->create($fAQ);

        $createdFAQ = $createdFAQ->toArray();
        $this->assertArrayHasKey('id', $createdFAQ);
        $this->assertNotNull($createdFAQ['id'], 'Created FAQ must have id specified');
        $this->assertNotNull(FAQ::find($createdFAQ['id']), 'FAQ with given id must be in DB');
        $this->assertModelData($fAQ, $createdFAQ);
    }

    /**
     * @test read
     */
    public function test_read_f_a_q()
    {
        $fAQ = factory(FAQ::class)->create();

        $dbFAQ = $this->fAQRepo->find($fAQ->id);

        $dbFAQ = $dbFAQ->toArray();
        $this->assertModelData($fAQ->toArray(), $dbFAQ);
    }

    /**
     * @test update
     */
    public function test_update_f_a_q()
    {
        $fAQ = factory(FAQ::class)->create();
        $fakeFAQ = factory(FAQ::class)->make()->toArray();

        $updatedFAQ = $this->fAQRepo->update($fakeFAQ, $fAQ->id);

        $this->assertModelData($fakeFAQ, $updatedFAQ->toArray());
        $dbFAQ = $this->fAQRepo->find($fAQ->id);
        $this->assertModelData($fakeFAQ, $dbFAQ->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_f_a_q()
    {
        $fAQ = factory(FAQ::class)->create();

        $resp = $this->fAQRepo->delete($fAQ->id);

        $this->assertTrue($resp);
        $this->assertNull(FAQ::find($fAQ->id), 'FAQ should not exist in DB');
    }
}
