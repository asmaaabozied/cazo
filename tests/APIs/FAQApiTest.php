<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\FAQ;

class FAQApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_f_a_q()
    {
        $fAQ = factory(FAQ::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/f_a_q_s', $fAQ
        );

        $this->assertApiResponse($fAQ);
    }

    /**
     * @test
     */
    public function test_read_f_a_q()
    {
        $fAQ = factory(FAQ::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/f_a_q_s/'.$fAQ->id
        );

        $this->assertApiResponse($fAQ->toArray());
    }

    /**
     * @test
     */
    public function test_update_f_a_q()
    {
        $fAQ = factory(FAQ::class)->create();
        $editedFAQ = factory(FAQ::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/f_a_q_s/'.$fAQ->id,
            $editedFAQ
        );

        $this->assertApiResponse($editedFAQ);
    }

    /**
     * @test
     */
    public function test_delete_f_a_q()
    {
        $fAQ = factory(FAQ::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/f_a_q_s/'.$fAQ->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/f_a_q_s/'.$fAQ->id
        );

        $this->response->assertStatus(404);
    }
}
