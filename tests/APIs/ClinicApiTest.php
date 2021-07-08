<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Clinic;

class ClinicApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_clinic()
    {
        $clinic = factory(Clinic::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/clinics', $clinic
        );

        $this->assertApiResponse($clinic);
    }

    /**
     * @test
     */
    public function test_read_clinic()
    {
        $clinic = factory(Clinic::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/clinics/'.$clinic->id
        );

        $this->assertApiResponse($clinic->toArray());
    }

    /**
     * @test
     */
    public function test_update_clinic()
    {
        $clinic = factory(Clinic::class)->create();
        $editedClinic = factory(Clinic::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/clinics/'.$clinic->id,
            $editedClinic
        );

        $this->assertApiResponse($editedClinic);
    }

    /**
     * @test
     */
    public function test_delete_clinic()
    {
        $clinic = factory(Clinic::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/clinics/'.$clinic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/clinics/'.$clinic->id
        );

        $this->response->assertStatus(404);
    }
}
