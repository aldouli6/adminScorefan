<?php namespace Tests\Repositories;

use App\Models\Tournament;
use App\Repositories\TournamentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TournamentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TournamentRepository
     */
    protected $tournamentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tournamentRepo = \App::make(TournamentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tournament()
    {
        $tournament = factory(Tournament::class)->make()->toArray();

        $createdTournament = $this->tournamentRepo->create($tournament);

        $createdTournament = $createdTournament->toArray();
        $this->assertArrayHasKey('id', $createdTournament);
        $this->assertNotNull($createdTournament['id'], 'Created Tournament must have id specified');
        $this->assertNotNull(Tournament::find($createdTournament['id']), 'Tournament with given id must be in DB');
        $this->assertModelData($tournament, $createdTournament);
    }

    /**
     * @test read
     */
    public function test_read_tournament()
    {
        $tournament = factory(Tournament::class)->create();

        $dbTournament = $this->tournamentRepo->find($tournament->id);

        $dbTournament = $dbTournament->toArray();
        $this->assertModelData($tournament->toArray(), $dbTournament);
    }

    /**
     * @test update
     */
    public function test_update_tournament()
    {
        $tournament = factory(Tournament::class)->create();
        $fakeTournament = factory(Tournament::class)->make()->toArray();

        $updatedTournament = $this->tournamentRepo->update($fakeTournament, $tournament->id);

        $this->assertModelData($fakeTournament, $updatedTournament->toArray());
        $dbTournament = $this->tournamentRepo->find($tournament->id);
        $this->assertModelData($fakeTournament, $dbTournament->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tournament()
    {
        $tournament = factory(Tournament::class)->create();

        $resp = $this->tournamentRepo->delete($tournament->id);

        $this->assertTrue($resp);
        $this->assertNull(Tournament::find($tournament->id), 'Tournament should not exist in DB');
    }
}
