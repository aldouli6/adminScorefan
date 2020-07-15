<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMatchAPIRequest;
use App\Http\Requests\API\UpdateMatchAPIRequest;
use App\Models\Match;
use App\Repositories\MatchRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MatchController
 * @package App\Http\Controllers\API
 */

class MatchAPIController extends AppBaseController
{
    /** @var  MatchRepository */
    private $matchRepository;

    public function __construct(MatchRepository $matchRepo)
    {
        $this->matchRepository = $matchRepo;
    }

    /**
     * Display a listing of the Match.
     * GET|HEAD /matches
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $matches = $this->matchRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $matches->toArray(),
            __('messages.retrieved', ['model' => __('models/matches.plural')])
        );
    }
    public function roundMatches(Request $request)
    {
        $matches = Match::where('round_id',$request->round_id)
                    ->where('state_id','2')
                    ->orderBy('date_time', 'asc')
                    ->get();
        return $this->sendResponse(
            $matches->toArray(),
            __('messages.retrieved', ['model' => __('models/matches.plural')])
        );
    }

    /**
     * Store a newly created Match in storage.
     * POST /matches
     *
     * @param CreateMatchAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchAPIRequest $request)
    {
        $input = $request->all();

        $match = $this->matchRepository->create($input);

        return $this->sendResponse(
            $match->toArray(),
            __('messages.saved', ['model' => __('models/matches.singular')])
        );
    }

    /**
     * Display the specified Match.
     * GET|HEAD /matches/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Match $match */
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/matches.singular')])
            );
        }

        return $this->sendResponse(
            $match->toArray(),
            __('messages.retrieved', ['model' => __('models/matches.singular')])
        );
    }

    /**
     * Update the specified Match in storage.
     * PUT/PATCH /matches/{id}
     *
     * @param int $id
     * @param UpdateMatchAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatchAPIRequest $request)
    {
        $input = $request->all();

        /** @var Match $match */
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/matches.singular')])
            );
        }

        $match = $this->matchRepository->update($input, $id);

        return $this->sendResponse(
            $match->toArray(),
            __('messages.updated', ['model' => __('models/matches.singular')])
        );
    }

    /**
     * Remove the specified Match from storage.
     * DELETE /matches/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Match $match */
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/matches.singular')])
            );
        }

        $match->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/matches.singular')])
        );
    }
}
