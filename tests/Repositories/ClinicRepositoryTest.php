<?php namespace Tests\Repositories;

use App\Models\Clinic;
use App\Repositories\ClinicRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClinicRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClinicRepository
     */
    protected $clinicRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clinicRepo = \App::make(ClinicRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_clinic()
    {
        $clinic = factory(Clinic::class)->make()->toArray();

        $createdClinic = $this->clinicRepo->create($clinic);

        $createdClinic = $createdClinic->toArray();
        $this->assertArrayHasKey('id', $createdClinic);
        $this->assertNotNull($createdClinic['id'], 'Created Clinic must have id specified');
        $this->assertNotNull(Clinic::find($createdClinic['id']), 'Clinic with given id must be in DB');
        $this->assertModelData($clinic, $createdClinic);
    }

    /**
     * @test read
     */
    public function test_read_clinic()
    {
        $clinic = factory(Clinic::class)->create();

        $dbClinic = $this->clinicRepo->find($clinic->id);

        $dbClinic = $dbClinic->toArray();
        $this->assertModelData($clinic->toArray(), $dbClinic);
    }

    /**
     * @test update
     */
    public function test_update_clinic()
    {
        $clinic = factory(Clinic::class)->create();
        $fakeClinic = factory(Clinic::class)->make()->toArray();

        $updatedClinic = $this->clinicRepo->update($fakeClinic, $clinic->id);

        $this->assertModelData($fakeClinic, $updatedClinic->toArray());
        $dbClinic = $this->clinicRepo->find($clinic->id);
        $this->assertModelData($fakeClinic, $dbClinic->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_clinic()
    {
        $clinic = factory(Clinic::class)->create();

        $resp = $this->clinicRepo->delete($clinic->id);

        $this->assertTrue($resp);
        $this->assertNull(Clinic::find($clinic->id), 'Clinic should not exist in DB');
    }
}
