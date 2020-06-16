<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Payment;

class PaymentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_payment()
    {
        $payment = factory(Payment::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/payments', $payment
        );

        $this->assertApiResponse($payment);
    }

    /**
     * @test
     */
    public function test_read_payment()
    {
        $payment = factory(Payment::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/payments/'.$payment->id
        );

        $this->assertApiResponse($payment->toArray());
    }

    /**
     * @test
     */
    public function test_update_payment()
    {
        $payment = factory(Payment::class)->create();
        $editedPayment = factory(Payment::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/payments/'.$payment->id,
            $editedPayment
        );

        $this->assertApiResponse($editedPayment);
    }

    /**
     * @test
     */
    public function test_delete_payment()
    {
        $payment = factory(Payment::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/payments/'.$payment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/payments/'.$payment->id
        );

        $this->response->assertStatus(404);
    }
}
