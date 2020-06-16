<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePaymentAPIRequest;
use App\Http\Requests\API\UpdatePaymentAPIRequest;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PaymentController
 * @package App\Http\Controllers\API
 */

class PaymentAPIController extends AppBaseController
{
    /** @var  PaymentRepository */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     * GET|HEAD /payments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $payments = $this->paymentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $payments->toArray(),
            __('messages.retrieved', ['model' => __('models/payments.plural')])
        );
    }

    /**
     * Store a newly created Payment in storage.
     * POST /payments
     *
     * @param CreatePaymentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePaymentAPIRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        return $this->sendResponse(
            $payment->toArray(),
            __('messages.saved', ['model' => __('models/payments.singular')])
        );
    }

    /**
     * Display the specified Payment.
     * GET|HEAD /payments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/payments.singular')])
            );
        }

        return $this->sendResponse(
            $payment->toArray(),
            __('messages.retrieved', ['model' => __('models/payments.singular')])
        );
    }

    /**
     * Update the specified Payment in storage.
     * PUT/PATCH /payments/{id}
     *
     * @param int $id
     * @param UpdatePaymentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePaymentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/payments.singular')])
            );
        }

        $payment = $this->paymentRepository->update($input, $id);

        return $this->sendResponse(
            $payment->toArray(),
            __('messages.updated', ['model' => __('models/payments.singular')])
        );
    }

    /**
     * Remove the specified Payment from storage.
     * DELETE /payments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Payment $payment */
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/payments.singular')])
            );
        }

        $payment->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/payments.singular')])
        );
    }
}
