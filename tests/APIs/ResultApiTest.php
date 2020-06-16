<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Result;

class ResultApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_result()
    {
        $result = factory(Result::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/results', $result
        );

        $this->assertApiResponse($result);
    }

    /**
     * @test
     */
    public function test_read_result()
    {
        $result = factory(Result::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/results/'.$result->id
        );

        $this->assertApiResponse($result->toArray());
    }

    /**
     * @test
     */
    public function test_update_result()
    {
        $result = factory(Result::class)->create();
        $editedResult = factory(Result::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/results/'.$result->id,
            $editedResult
        );

        $this->assertApiResponse($editedResult);
    }

    /**
     * @test
     */
    public function test_delete_result()
    {
        $result = factory(Result::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/results/'.$result->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/results/'.$result->id
        );

        $this->response->assertStatus(404);
    }
}
