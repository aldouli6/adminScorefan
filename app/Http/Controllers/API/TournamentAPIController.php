<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTournamentAPIRequest;
use App\Http\Requests\API\UpdateTournamentAPIRequest;
use App\Models\Tournament;
use App\Repositories\TournamentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TournamentController
 * @package App\Http\Controllers\API
 */

class TournamentAPIController extends AppBaseController
{
    /** @var  TournamentRepository */
    private $tournamentRepository;

    public function __construct(TournamentRepository $tournamentRepo)
    {
        $this->tournamentRepository = $tournamentRepo;
    }

    /**
     * Display a listing of the Tournament.
     * GET|HEAD /tournaments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tournaments = $this->tournamentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $tournaments->toArray(),
            __('messages.retrieved', ['model' => __('models/tournaments.plural')])
        );
    }

    /**
     * Store a newly created Tournament in storage.
     * POST /tournaments
     *
     * @param CreateTournamentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTournamentAPIRequest $request)
    {
        $input = $request->all();

        $tournament = $this->tournamentRepository->create($input);

        return $this->sendResponse(
            $tournament->toArray(),
            __('messages.saved', ['model' => __('models/tournaments.singular')])
        );
    }

    /**
     * Display the specified Tournament.
     * GET|HEAD /tournaments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tournament $tournament */
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tournaments.singular')])
            );
        }

        return $this->sendResponse(
            $tournament->toArray(),
            __('messages.retrieved', ['model' => __('models/tournaments.singular')])
        );
    }

    /**
     * Update the specified Tournament in storage.
     * PUT/PATCH /tournaments/{id}
     *
     * @param int $id
     * @param UpdateTournamentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTournamentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tournament $tournament */
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tournaments.singular')])
            );
        }

        $tournament = $this->tournamentRepository->update($input, $id);

        return $this->sendResponse(
            $tournament->toArray(),
            __('messages.updated', ['model' => __('models/tournaments.singular')])
        );
    }

    /**
     * Remove the specified Tournament from storage.
     * DELETE /tournaments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tournament $tournament */
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/tournaments.singular')])
            );
        }

        $tournament->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/tournaments.singular')])
        );
    }
}
