<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\League;

class LeagueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_league()
    {
        $league = factory(League::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/leagues', $league
        );

        $this->assertApiResponse($league);
    }

    /**
     * @test
     */
    public function test_read_league()
    {
        $league = factory(League::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/leagues/'.$league->id
        );

        $this->assertApiResponse($league->toArray());
    }

    /**
     * @test
     */
    public function test_update_league()
    {
        $league = factory(League::class)->create();
        $editedLeague = factory(League::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/leagues/'.$league->id,
            $editedLeague
        );

        $this->assertApiResponse($editedLeague);
    }

    /**
     * @test
     */
    public function test_delete_league()
    {
        $league = factory(League::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/leagues/'.$league->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/leagues/'.$league->id
        );

        $this->response->assertStatus(404);
    }
}
