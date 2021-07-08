<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Complains;

class ComplainsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_complains()
    {
        $complains = factory(Complains::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/complains', $complains
        );

        $this->assertApiResponse($complains);
    }

    /**
     * @test
     */
    public function test_read_complains()
    {
        $complains = factory(Complains::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/complains/'.$complains->id
        );

        $this->assertApiResponse($complains->toArray());
    }

    /**
     * @test
     */
    public function test_update_complains()
    {
        $complains = factory(Complains::class)->create();
        $editedComplains = factory(Complains::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/complains/'.$complains->id,
            $editedComplains
        );

        $this->assertApiResponse($editedComplains);
    }

    /**
     * @test
     */
    public function test_delete_complains()
    {
        $complains = factory(Complains::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/complains/'.$complains->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/complains/'.$complains->id
        );

        $this->response->assertStatus(404);
    }
}
