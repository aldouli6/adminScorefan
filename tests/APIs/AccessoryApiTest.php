<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accessory;

class AccessoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_accessory()
    {
        $accessory = factory(Accessory::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accessories', $accessory
        );

        $this->assertApiResponse($accessory);
    }

    /**
     * @test
     */
    public function test_read_accessory()
    {
        $accessory = factory(Accessory::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/accessories/'.$accessory->id
        );

        $this->assertApiResponse($accessory->toArray());
    }

    /**
     * @test
     */
    public function test_update_accessory()
    {
        $accessory = factory(Accessory::class)->create();
        $editedAccessory = factory(Accessory::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accessories/'.$accessory->id,
            $editedAccessory
        );

        $this->assertApiResponse($editedAccessory);
    }

    /**
     * @test
     */
    public function test_delete_accessory()
    {
        $accessory = factory(Accessory::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accessories/'.$accessory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accessories/'.$accessory->id
        );

        $this->response->assertStatus(404);
    }
}
