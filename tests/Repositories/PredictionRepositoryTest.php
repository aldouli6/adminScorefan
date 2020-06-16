<?php namespace Tests\Repositories;

use App\Models\Prediction;
use App\Repositories\PredictionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PredictionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PredictionRepository
     */
    protected $predictionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->predictionRepo = \App::make(PredictionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_prediction()
    {
        $prediction = factory(Prediction::class)->make()->toArray();

        $createdPrediction = $this->predictionRepo->create($prediction);

        $createdPrediction = $createdPrediction->toArray();
        $this->assertArrayHasKey('id', $createdPrediction);
        $this->assertNotNull($createdPrediction['id'], 'Created Prediction must have id specified');
        $this->assertNotNull(Prediction::find($createdPrediction['id']), 'Prediction with given id must be in DB');
        $this->assertModelData($prediction, $createdPrediction);
    }

    /**
     * @test read
     */
    public function test_read_prediction()
    {
        $prediction = factory(Prediction::class)->create();

        $dbPrediction = $this->predictionRepo->find($prediction->id);

        $dbPrediction = $dbPrediction->toArray();
        $this->assertModelData($prediction->toArray(), $dbPrediction);
    }

    /**
     * @test update
     */
    public function test_update_prediction()
    {
        $prediction = factory(Prediction::class)->create();
        $fakePrediction = factory(Prediction::class)->make()->toArray();

        $updatedPrediction = $this->predictionRepo->update($fakePrediction, $prediction->id);

        $this->assertModelData($fakePrediction, $updatedPrediction->toArray());
        $dbPrediction = $this->predictionRepo->find($prediction->id);
        $this->assertModelData($fakePrediction, $dbPrediction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_prediction()
    {
        $prediction = factory(Prediction::class)->create();

        $resp = $this->predictionRepo->delete($prediction->id);

        $this->assertTrue($resp);
        $this->assertNull(Prediction::find($prediction->id), 'Prediction should not exist in DB');
    }
}
