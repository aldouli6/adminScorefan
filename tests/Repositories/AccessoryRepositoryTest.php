<?php namespace Tests\Repositories;

use App\Models\Accessory;
use App\Repositories\AccessoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccessoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AccessoryRepository
     */
    protected $accessoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accessoryRepo = \App::make(AccessoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_accessory()
    {
        $accessory = factory(Accessory::class)->make()->toArray();

        $createdAccessory = $this->accessoryRepo->create($accessory);

        $createdAccessory = $createdAccessory->toArray();
        $this->assertArrayHasKey('id', $createdAccessory);
        $this->assertNotNull($createdAccessory['id'], 'Created Accessory must have id specified');
        $this->assertNotNull(Accessory::find($createdAccessory['id']), 'Accessory with given id must be in DB');
        $this->assertModelData($accessory, $createdAccessory);
    }

    /**
     * @test read
     */
    public function test_read_accessory()
    {
        $accessory = factory(Accessory::class)->create();

        $dbAccessory = $this->accessoryRepo->find($accessory->id);

        $dbAccessory = $dbAccessory->toArray();
        $this->assertModelData($accessory->toArray(), $dbAccessory);
    }

    /**
     * @test update
     */
    public function test_update_accessory()
    {
        $accessory = factory(Accessory::class)->create();
        $fakeAccessory = factory(Accessory::class)->make()->toArray();

        $updatedAccessory = $this->accessoryRepo->update($fakeAccessory, $accessory->id);

        $this->assertModelData($fakeAccessory, $updatedAccessory->toArray());
        $dbAccessory = $this->accessoryRepo->find($accessory->id);
        $this->assertModelData($fakeAccessory, $dbAccessory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_accessory()
    {
        $accessory = factory(Accessory::class)->create();

        $resp = $this->accessoryRepo->delete($accessory->id);

        $this->assertTrue($resp);
        $this->assertNull(Accessory::find($accessory->id), 'Accessory should not exist in DB');
    }
}
