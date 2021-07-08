<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\User;

class ClientsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_clients()
    {
        $clients = factory(Clients::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/clients', $clients
        );

        $this->assertApiResponse($clients);
    }

    /**
     * @test
     */
    public function test_read_clients()
    {
        $clients = factory(Clients::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/clients/'.$clients->id
        );

        $this->assertApiResponse($clients->toArray());
    }

    /**
     * @test
     */
    public function test_update_clients()
    {
        $clients = factory(Clients::class)->create();
        $editedClients = factory(Clients::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/clients/'.$clients->id,
            $editedClients
        );

        $this->assertApiResponse($editedClients);
    }

    /**
     * @test
     */
    public function test_delete_clients()
    {
        $clients = factory(Clients::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/clients/'.$clients->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/clients/'.$clients->id
        );

        $this->response->assertStatus(404);
    }
}
