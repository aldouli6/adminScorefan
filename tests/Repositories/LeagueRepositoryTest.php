<?php namespace Tests\Repositories;

use App\Models\League;
use App\Repositories\LeagueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class LeagueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var LeagueRepository
     */
    protected $leagueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->leagueRepo = \App::make(LeagueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_league()
    {
        $league = factory(League::class)->make()->toArray();

        $createdLeague = $this->leagueRepo->create($league);

        $createdLeague = $createdLeague->toArray();
        $this->assertArrayHasKey('id', $createdLeague);
        $this->assertNotNull($createdLeague['id'], 'Created League must have id specified');
        $this->assertNotNull(League::find($createdLeague['id']), 'League with given id must be in DB');
        $this->assertModelData($league, $createdLeague);
    }

    /**
     * @test read
     */
    public function test_read_league()
    {
        $league = factory(League::class)->create();

        $dbLeague = $this->leagueRepo->find($league->id);

        $dbLeague = $dbLeague->toArray();
        $this->assertModelData($league->toArray(), $dbLeague);
    }

    /**
     * @test update
     */
    public function test_update_league()
    {
        $league = factory(League::class)->create();
        $fakeLeague = factory(League::class)->make()->toArray();

        $updatedLeague = $this->leagueRepo->update($fakeLeague, $league->id);

        $this->assertModelData($fakeLeague, $updatedLeague->toArray());
        $dbLeague = $this->leagueRepo->find($league->id);
        $this->assertModelData($fakeLeague, $dbLeague->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_league()
    {
        $league = factory(League::class)->create();

        $resp = $this->leagueRepo->delete($league->id);

        $this->assertTrue($resp);
        $this->assertNull(League::find($league->id), 'League should not exist in DB');
    }
}
