<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Method;

class MethodApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_method()
    {
        $method = factory(Method::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/methods', $method
        );

        $this->assertApiResponse($method);
    }

    /**
     * @test
     */
    public function test_read_method()
    {
        $method = factory(Method::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/methods/'.$method->id
        );

        $this->assertApiResponse($method->toArray());
    }

    /**
     * @test
     */
    public function test_update_method()
    {
        $method = factory(Method::class)->create();
        $editedMethod = factory(Method::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/methods/'.$method->id,
            $editedMethod
        );

        $this->assertApiResponse($editedMethod);
    }

    /**
     * @test
     */
    public function test_delete_method()
    {
        $method = factory(Method::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/methods/'.$method->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/methods/'.$method->id
        );

        $this->response->assertStatus(404);
    }
}
