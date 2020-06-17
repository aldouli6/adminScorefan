<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Round;

class RoundApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_round()
    {
        $round = factory(Round::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/rounds', $round
        );

        $this->assertApiResponse($round);
    }

    /**
     * @test
     */
    public function test_read_round()
    {
        $round = factory(Round::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/rounds/'.$round->id
        );

        $this->assertApiResponse($round->toArray());
    }

    /**
     * @test
     */
    public function test_update_round()
    {
        $round = factory(Round::class)->create();
        $editedRound = factory(Round::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/rounds/'.$round->id,
            $editedRound
        );

        $this->assertApiResponse($editedRound);
    }

    /**
     * @test
     */
    public function test_delete_round()
    {
        $round = factory(Round::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/rounds/'.$round->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/rounds/'.$round->id
        );

        $this->response->assertStatus(404);
    }
}
