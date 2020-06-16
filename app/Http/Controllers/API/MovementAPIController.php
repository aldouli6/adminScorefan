<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMovementAPIRequest;
use App\Http\Requests\API\UpdateMovementAPIRequest;
use App\Models\Movement;
use App\Repositories\MovementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MovementController
 * @package App\Http\Controllers\API
 */

class MovementAPIController extends AppBaseController
{
    /** @var  MovementRepository */
    private $movementRepository;

    public function __construct(MovementRepository $movementRepo)
    {
        $this->movementRepository = $movementRepo;
    }

    /**
     * Display a listing of the Movement.
     * GET|HEAD /movements
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $movements = $this->movementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $movements->toArray(),
            __('messages.retrieved', ['model' => __('models/movements.plural')])
        );
    }

    /**
     * Store a newly created Movement in storage.
     * POST /movements
     *
     * @param CreateMovementAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMovementAPIRequest $request)
    {
        $input = $request->all();

        $movement = $this->movementRepository->create($input);

        return $this->sendResponse(
            $movement->toArray(),
            __('messages.saved', ['model' => __('models/movements.singular')])
        );
    }

    /**
     * Display the specified Movement.
     * GET|HEAD /movements/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Movement $movement */
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/movements.singular')])
            );
        }

        return $this->sendResponse(
            $movement->toArray(),
            __('messages.retrieved', ['model' => __('models/movements.singular')])
        );
    }

    /**
     * Update the specified Movement in storage.
     * PUT/PATCH /movements/{id}
     *
     * @param int $id
     * @param UpdateMovementAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Movement $movement */
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/movements.singular')])
            );
        }

        $movement = $this->movementRepository->update($input, $id);

        return $this->sendResponse(
            $movement->toArray(),
            __('messages.updated', ['model' => __('models/movements.singular')])
        );
    }

    /**
     * Remove the specified Movement from storage.
     * DELETE /movements/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Movement $movement */
        $movement = $this->movementRepository->find($id);

        if (empty($movement)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/movements.singular')])
            );
        }

        $movement->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/movements.singular')])
        );
    }
}
