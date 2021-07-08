<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Favourite;

class FavouriteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_favourite()
    {
        $favourite = factory(Favourite::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/favourites', $favourite
        );

        $this->assertApiResponse($favourite);
    }

    /**
     * @test
     */
    public function test_read_favourite()
    {
        $favourite = factory(Favourite::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/favourites/'.$favourite->id
        );

        $this->assertApiResponse($favourite->toArray());
    }

    /**
     * @test
     */
    public function test_update_favourite()
    {
        $favourite = factory(Favourite::class)->create();
        $editedFavourite = factory(Favourite::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/favourites/'.$favourite->id,
            $editedFavourite
        );

        $this->assertApiResponse($editedFavourite);
    }

    /**
     * @test
     */
    public function test_delete_favourite()
    {
        $favourite = factory(Favourite::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/favourites/'.$favourite->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/favourites/'.$favourite->id
        );

        $this->response->assertStatus(404);
    }
}
