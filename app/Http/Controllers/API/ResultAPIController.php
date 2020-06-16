<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateResultAPIRequest;
use App\Http\Requests\API\UpdateResultAPIRequest;
use App\Models\Result;
use App\Repositories\ResultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ResultController
 * @package App\Http\Controllers\API
 */

class ResultAPIController extends AppBaseController
{
    /** @var  ResultRepository */
    private $resultRepository;

    public function __construct(ResultRepository $resultRepo)
    {
        $this->resultRepository = $resultRepo;
    }

    /**
     * Display a listing of the Result.
     * GET|HEAD /results
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $results = $this->resultRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $results->toArray(),
            __('messages.retrieved', ['model' => __('models/results.plural')])
        );
    }

    /**
     * Store a newly created Result in storage.
     * POST /results
     *
     * @param CreateResultAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResultAPIRequest $request)
    {
        $input = $request->all();

        $result = $this->resultRepository->create($input);

        return $this->sendResponse(
            $result->toArray(),
            __('messages.saved', ['model' => __('models/results.singular')])
        );
    }

    /**
     * Display the specified Result.
     * GET|HEAD /results/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Result $result */
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/results.singular')])
            );
        }

        return $this->sendResponse(
            $result->toArray(),
            __('messages.retrieved', ['model' => __('models/results.singular')])
        );
    }

    /**
     * Update the specified Result in storage.
     * PUT/PATCH /results/{id}
     *
     * @param int $id
     * @param UpdateResultAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultAPIRequest $request)
    {
        $input = $request->all();

        /** @var Result $result */
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/results.singular')])
            );
        }

        $result = $this->resultRepository->update($input, $id);

        return $this->sendResponse(
            $result->toArray(),
            __('messages.updated', ['model' => __('models/results.singular')])
        );
    }

    /**
     * Remove the specified Result from storage.
     * DELETE /results/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Result $result */
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/results.singular')])
            );
        }

        $result->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/results.singular')])
        );
    }
}
