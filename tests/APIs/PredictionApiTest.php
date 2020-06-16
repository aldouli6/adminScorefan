<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Prediction;

class PredictionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_prediction()
    {
        $prediction = factory(Prediction::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/predictions', $prediction
        );

        $this->assertApiResponse($prediction);
    }

    /**
     * @test
     */
    public function test_read_prediction()
    {
        $prediction = factory(Prediction::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/predictions/'.$prediction->id
        );

        $this->assertApiResponse($prediction->toArray());
    }

    /**
     * @test
     */
    public function test_update_prediction()
    {
        $prediction = factory(Prediction::class)->create();
        $editedPrediction = factory(Prediction::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/predictions/'.$prediction->id,
            $editedPrediction
        );

        $this->assertApiResponse($editedPrediction);
    }

    /**
     * @test
     */
    public function test_delete_prediction()
    {
        $prediction = factory(Prediction::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/predictions/'.$prediction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/predictions/'.$prediction->id
        );

        $this->response->assertStatus(404);
    }
}
