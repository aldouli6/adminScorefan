<?php namespace Tests\Repositories;

use App\Models\Result;
use App\Repositories\ResultRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ResultRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResultRepository
     */
    protected $resultRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->resultRepo = \App::make(ResultRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_result()
    {
        $result = factory(Result::class)->make()->toArray();

        $createdResult = $this->resultRepo->create($result);

        $createdResult = $createdResult->toArray();
        $this->assertArrayHasKey('id', $createdResult);
        $this->assertNotNull($createdResult['id'], 'Created Result must have id specified');
        $this->assertNotNull(Result::find($createdResult['id']), 'Result with given id must be in DB');
        $this->assertModelData($result, $createdResult);
    }

    /**
     * @test read
     */
    public function test_read_result()
    {
        $result = factory(Result::class)->create();

        $dbResult = $this->resultRepo->find($result->id);

        $dbResult = $dbResult->toArray();
        $this->assertModelData($result->toArray(), $dbResult);
    }

    /**
     * @test update
     */
    public function test_update_result()
    {
        $result = factory(Result::class)->create();
        $fakeResult = factory(Result::class)->make()->toArray();

        $updatedResult = $this->resultRepo->update($fakeResult, $result->id);

        $this->assertModelData($fakeResult, $updatedResult->toArray());
        $dbResult = $this->resultRepo->find($result->id);
        $this->assertModelData($fakeResult, $dbResult->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_result()
    {
        $result = factory(Result::class)->create();

        $resp = $this->resultRepo->delete($result->id);

        $this->assertTrue($resp);
        $this->assertNull(Result::find($result->id), 'Result should not exist in DB');
    }
}
