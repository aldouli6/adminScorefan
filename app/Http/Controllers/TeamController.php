<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Repositories\TeamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TeamController extends AppBaseController
{
    /** @var  TeamRepository */
    private $teamRepository;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepository = $teamRepo;
    }

    /**
     * Display a listing of the Team.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teams = $this->teamRepository->all();

        return view('teams.index')
            ->with('teams', $teams);
    }

    /**
     * Show the form for creating a new Team.
     *
     * @return Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param CreateTeamRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();

        $team = $this->teamRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/teams.singular')]));

        return redirect(route('teams.index'));
    }

    /**
     * Display the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teams.singular')]));

            return redirect(route('teams.index'));
        }

        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teams.singular')]));

            return redirect(route('teams.index'));
        }

        return view('teams.edit')->with('team', $team);
    }

    /**
     * Update the specified Team in storage.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamRequest $request)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teams.singular')]));

            return redirect(route('teams.index'));
        }

        $team = $this->teamRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/teams.singular')]));

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $team = $this->teamRepository->find($id);

        if (empty($team)) {
            Flash::error(__('messages.not_found', ['model' => __('models/teams.singular')]));

            return redirect(route('teams.index'));
        }

        $this->teamRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/teams.singular')]));

        return redirect(route('teams.index'));
    }
}
