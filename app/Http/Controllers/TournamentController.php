<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use App\Repositories\TournamentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TournamentController extends AppBaseController
{
    /** @var  TournamentRepository */
    private $tournamentRepository;

    public function __construct(TournamentRepository $tournamentRepo)
    {
        $this->tournamentRepository = $tournamentRepo;
    }

    /**
     * Display a listing of the Tournament.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tournaments = $this->tournamentRepository->all();

        return view('tournaments.index')
            ->with('tournaments', $tournaments);
    }

    /**
     * Show the form for creating a new Tournament.
     *
     * @return Response
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created Tournament in storage.
     *
     * @param CreateTournamentRequest $request
     *
     * @return Response
     */
    public function store(CreateTournamentRequest $request)
    {
        $input = $request->all();

        $tournament = $this->tournamentRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tournaments.singular')]));

        return redirect(route('tournaments.index'));
    }

    /**
     * Display the specified Tournament.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tournaments.singular')]));

            return redirect(route('tournaments.index'));
        }

        return view('tournaments.show')->with('tournament', $tournament);
    }

    /**
     * Show the form for editing the specified Tournament.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tournaments.singular')]));

            return redirect(route('tournaments.index'));
        }

        return view('tournaments.edit')->with('tournament', $tournament);
    }

    /**
     * Update the specified Tournament in storage.
     *
     * @param int $id
     * @param UpdateTournamentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTournamentRequest $request)
    {
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tournaments.singular')]));

            return redirect(route('tournaments.index'));
        }

        $tournament = $this->tournamentRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tournaments.singular')]));

        return redirect(route('tournaments.index'));
    }

    /**
     * Remove the specified Tournament from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tournament = $this->tournamentRepository->find($id);

        if (empty($tournament)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tournaments.singular')]));

            return redirect(route('tournaments.index'));
        }

        $this->tournamentRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tournaments.singular')]));

        return redirect(route('tournaments.index'));
    }
}
