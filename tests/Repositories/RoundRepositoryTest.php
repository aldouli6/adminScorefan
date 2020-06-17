<?php namespace Tests\Repositories;

use App\Models\Round;
use App\Repositories\RoundRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RoundRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoundRepository
     */
    protected $roundRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->roundRepo = \App::make(RoundRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_round()
    {
        $round = factory(Round::class)->make()->toArray();

        $createdRound = $this->roundRepo->create($round);

        $createdRound = $createdRound->toArray();
        $this->assertArrayHasKey('id', $createdRound);
        $this->assertNotNull($createdRound['id'], 'Created Round must have id specified');
        $this->assertNotNull(Round::find($createdRound['id']), 'Round with given id must be in DB');
        $this->assertModelData($round, $createdRound);
    }

    /**
     * @test read
     */
    public function test_read_round()
    {
        $round = factory(Round::class)->create();

        $dbRound = $this->roundRepo->find($round->id);

        $dbRound = $dbRound->toArray();
        $this->assertModelData($round->toArray(), $dbRound);
    }

    /**
     * @test update
     */
    public function test_update_round()
    {
        $round = factory(Round::class)->create();
        $fakeRound = factory(Round::class)->make()->toArray();

        $updatedRound = $this->roundRepo->update($fakeRound, $round->id);

        $this->assertModelData($fakeRound, $updatedRound->toArray());
        $dbRound = $this->roundRepo->find($round->id);
        $this->assertModelData($fakeRound, $dbRound->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_round()
    {
        $round = factory(Round::class)->create();

        $resp = $this->roundRepo->delete($round->id);

        $this->assertTrue($resp);
        $this->assertNull(Round::find($round->id), 'Round should not exist in DB');
    }
}
