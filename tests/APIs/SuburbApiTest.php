<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Suburb;

class SuburbApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_suburb()
    {
        $suburb = factory(Suburb::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/suburbs', $suburb
        );

        $this->assertApiResponse($suburb);
    }

    /**
     * @test
     */
    public function test_read_suburb()
    {
        $suburb = factory(Suburb::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/suburbs/'.$suburb->id
        );

        $this->assertApiResponse($suburb->toArray());
    }

    /**
     * @test
     */
    public function test_update_suburb()
    {
        $suburb = factory(Suburb::class)->create();
        $editedSuburb = factory(Suburb::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/suburbs/'.$suburb->id,
            $editedSuburb
        );

        $this->assertApiResponse($editedSuburb);
    }

    /**
     * @test
     */
    public function test_delete_suburb()
    {
        $suburb = factory(Suburb::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/suburbs/'.$suburb->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/suburbs/'.$suburb->id
        );

        $this->response->assertStatus(404);
    }
}
