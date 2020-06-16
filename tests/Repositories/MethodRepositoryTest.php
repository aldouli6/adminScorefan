<?php namespace Tests\Repositories;

use App\Models\Method;
use App\Repositories\MethodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MethodRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MethodRepository
     */
    protected $methodRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->methodRepo = \App::make(MethodRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_method()
    {
        $method = factory(Method::class)->make()->toArray();

        $createdMethod = $this->methodRepo->create($method);

        $createdMethod = $createdMethod->toArray();
        $this->assertArrayHasKey('id', $createdMethod);
        $this->assertNotNull($createdMethod['id'], 'Created Method must have id specified');
        $this->assertNotNull(Method::find($createdMethod['id']), 'Method with given id must be in DB');
        $this->assertModelData($method, $createdMethod);
    }

    /**
     * @test read
     */
    public function test_read_method()
    {
        $method = factory(Method::class)->create();

        $dbMethod = $this->methodRepo->find($method->id);

        $dbMethod = $dbMethod->toArray();
        $this->assertModelData($method->toArray(), $dbMethod);
    }

    /**
     * @test update
     */
    public function test_update_method()
    {
        $method = factory(Method::class)->create();
        $fakeMethod = factory(Method::class)->make()->toArray();

        $updatedMethod = $this->methodRepo->update($fakeMethod, $method->id);

        $this->assertModelData($fakeMethod, $updatedMethod->toArray());
        $dbMethod = $this->methodRepo->find($method->id);
        $this->assertModelData($fakeMethod, $dbMethod->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_method()
    {
        $method = factory(Method::class)->create();

        $resp = $this->methodRepo->delete($method->id);

        $this->assertTrue($resp);
        $this->assertNull(Method::find($method->id), 'Method should not exist in DB');
    }
}
