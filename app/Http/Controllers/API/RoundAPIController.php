<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoundAPIRequest;
use App\Http\Requests\API\UpdateRoundAPIRequest;
use App\Models\Round;
use App\Repositories\RoundRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RoundController
 * @package App\Http\Controllers\API
 */

class RoundAPIController extends AppBaseController
{
    /** @var  RoundRepository */
    private $roundRepository;

    public function __construct(RoundRepository $roundRepo)
    {
        $this->roundRepository = $roundRepo;
    }

    /**
     * Display a listing of the Round.
     * GET|HEAD /rounds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $rounds = $this->roundRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $rounds->toArray(),
            __('messages.retrieved', ['model' => __('models/rounds.plural')])
        );
    }

    /**
     * Store a newly created Round in storage.
     * POST /rounds
     *
     * @param CreateRoundAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoundAPIRequest $request)
    {
        $input = $request->all();

        $round = $this->roundRepository->create($input);

        return $this->sendResponse(
            $round->toArray(),
            __('messages.saved', ['model' => __('models/rounds.singular')])
        );
    }

    /**
     * Display the specified Round.
     * GET|HEAD /rounds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Round $round */
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/rounds.singular')])
            );
        }

        return $this->sendResponse(
            $round->toArray(),
            __('messages.retrieved', ['model' => __('models/rounds.singular')])
        );
    }

    /**
     * Update the specified Round in storage.
     * PUT/PATCH /rounds/{id}
     *
     * @param int $id
     * @param UpdateRoundAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoundAPIRequest $request)
    {
        $input = $request->all();

        /** @var Round $round */
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/rounds.singular')])
            );
        }

        $round = $this->roundRepository->update($input, $id);

        return $this->sendResponse(
            $round->toArray(),
            __('messages.updated', ['model' => __('models/rounds.singular')])
        );
    }

    /**
     * Remove the specified Round from storage.
     * DELETE /rounds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Round $round */
        $round = $this->roundRepository->find($id);

        if (empty($round)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/rounds.singular')])
            );
        }

        $round->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/rounds.singular')])
        );
    }
}
