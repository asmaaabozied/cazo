<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ComplainTypes;

class ComplainTypesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/complain_types', $complainTypes
        );

        $this->assertApiResponse($complainTypes);
    }

    /**
     * @test
     */
    public function test_read_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/complain_types/'.$complainTypes->id
        );

        $this->assertApiResponse($complainTypes->toArray());
    }

    /**
     * @test
     */
    public function test_update_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->create();
        $editedComplainTypes = factory(ComplainTypes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/complain_types/'.$complainTypes->id,
            $editedComplainTypes
        );

        $this->assertApiResponse($editedComplainTypes);
    }

    /**
     * @test
     */
    public function test_delete_complain_types()
    {
        $complainTypes = factory(ComplainTypes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/complain_types/'.$complainTypes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/complain_types/'.$complainTypes->id
        );

        $this->response->assertStatus(404);
    }
}
