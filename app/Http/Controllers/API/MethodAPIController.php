<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMethodAPIRequest;
use App\Http\Requests\API\UpdateMethodAPIRequest;
use App\Models\Method;
use App\Repositories\MethodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MethodController
 * @package App\Http\Controllers\API
 */

class MethodAPIController extends AppBaseController
{
    /** @var  MethodRepository */
    private $methodRepository;

    public function __construct(MethodRepository $methodRepo)
    {
        $this->methodRepository = $methodRepo;
    }

    /**
     * Display a listing of the Method.
     * GET|HEAD /methods
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $methods = $this->methodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $methods->toArray(),
            __('messages.retrieved', ['model' => __('models/methods.plural')])
        );
    }

    /**
     * Store a newly created Method in storage.
     * POST /methods
     *
     * @param CreateMethodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMethodAPIRequest $request)
    {
        $input = $request->all();

        $method = $this->methodRepository->create($input);

        return $this->sendResponse(
            $method->toArray(),
            __('messages.saved', ['model' => __('models/methods.singular')])
        );
    }

    /**
     * Display the specified Method.
     * GET|HEAD /methods/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Method $method */
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/methods.singular')])
            );
        }

        return $this->sendResponse(
            $method->toArray(),
            __('messages.retrieved', ['model' => __('models/methods.singular')])
        );
    }

    /**
     * Update the specified Method in storage.
     * PUT/PATCH /methods/{id}
     *
     * @param int $id
     * @param UpdateMethodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMethodAPIRequest $request)
    {
        $input = $request->all();

        /** @var Method $method */
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/methods.singular')])
            );
        }

        $method = $this->methodRepository->update($input, $id);

        return $this->sendResponse(
            $method->toArray(),
            __('messages.updated', ['model' => __('models/methods.singular')])
        );
    }

    /**
     * Remove the specified Method from storage.
     * DELETE /methods/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Method $method */
        $method = $this->methodRepository->find($id);

        if (empty($method)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/methods.singular')])
            );
        }

        $method->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/methods.singular')])
        );
    }
}
