<?php namespace Tests\Repositories;

use App\Models\User;
use App\Repositories\ClientsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ClientsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ClientsRepository
     */
    protected $clientsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientsRepo = \App::make(ClientsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_clients()
    {
        $clients = factory(Clients::class)->make()->toArray();

        $createdClients = $this->clientsRepo->create($clients);

        $createdClients = $createdClients->toArray();
        $this->assertArrayHasKey('id', $createdClients);
        $this->assertNotNull($createdClients['id'], 'Created Clients must have id specified');
        $this->assertNotNull(Clients::find($createdClients['id']), 'Clients with given id must be in DB');
        $this->assertModelData($clients, $createdClients);
    }

    /**
     * @test read
     */
    public function test_read_clients()
    {
        $clients = factory(Clients::class)->create();

        $dbClients = $this->clientsRepo->find($clients->id);

        $dbClients = $dbClients->toArray();
        $this->assertModelData($clients->toArray(), $dbClients);
    }

    /**
     * @test update
     */
    public function test_update_clients()
    {
        $clients = factory(Clients::class)->create();
        $fakeClients = factory(Clients::class)->make()->toArray();

        $updatedClients = $this->clientsRepo->update($fakeClients, $clients->id);

        $this->assertModelData($fakeClients, $updatedClients->toArray());
        $dbClients = $this->clientsRepo->find($clients->id);
        $this->assertModelData($fakeClients, $dbClients->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_clients()
    {
        $clients = factory(Clients::class)->create();

        $resp = $this->clientsRepo->delete($clients->id);

        $this->assertTrue($resp);
        $this->assertNull(Clients::find($clients->id), 'Clients should not exist in DB');
    }
}
