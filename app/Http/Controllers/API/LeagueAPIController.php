<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLeagueAPIRequest;
use App\Http\Requests\API\UpdateLeagueAPIRequest;
use App\Models\League;
use App\Repositories\LeagueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LeagueController
 * @package App\Http\Controllers\API
 */

class LeagueAPIController extends AppBaseController
{
    /** @var  LeagueRepository */
    private $leagueRepository;

    public function __construct(LeagueRepository $leagueRepo)
    {
        $this->leagueRepository = $leagueRepo;
    }

    /**
     * Display a listing of the League.
     * GET|HEAD /leagues
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $leagues = $this->leagueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $leagues->toArray(),
            __('messages.retrieved', ['model' => __('models/leagues.plural')])
        );
    }

    /**
     * Store a newly created League in storage.
     * POST /leagues
     *
     * @param CreateLeagueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLeagueAPIRequest $request)
    {
        $input = $request->all();

        $league = $this->leagueRepository->create($input);

        return $this->sendResponse(
            $league->toArray(),
            __('messages.saved', ['model' => __('models/leagues.singular')])
        );
    }

    /**
     * Display the specified League.
     * GET|HEAD /leagues/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var League $league */
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/leagues.singular')])
            );
        }

        return $this->sendResponse(
            $league->toArray(),
            __('messages.retrieved', ['model' => __('models/leagues.singular')])
        );
    }

    /**
     * Update the specified League in storage.
     * PUT/PATCH /leagues/{id}
     *
     * @param int $id
     * @param UpdateLeagueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeagueAPIRequest $request)
    {
        $input = $request->all();

        /** @var League $league */
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/leagues.singular')])
            );
        }

        $league = $this->leagueRepository->update($input, $id);

        return $this->sendResponse(
            $league->toArray(),
            __('messages.updated', ['model' => __('models/leagues.singular')])
        );
    }

    /**
     * Remove the specified League from storage.
     * DELETE /leagues/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var League $league */
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/leagues.singular')])
            );
        }

        $league->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/leagues.singular')])
        );
    }
}
