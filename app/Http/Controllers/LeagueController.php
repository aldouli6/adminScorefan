<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Repositories\LeagueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeagueController extends AppBaseController
{
    /** @var  LeagueRepository */
    private $leagueRepository;

    public function __construct(LeagueRepository $leagueRepo)
    {
        $this->leagueRepository = $leagueRepo;
    }

    /**
     * Display a listing of the League.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $leagues = $this->leagueRepository->all();

        return view('leagues.index')
            ->with('leagues', $leagues);
    }

    /**
     * Show the form for creating a new League.
     *
     * @return Response
     */
    public function create()
    {
        return view('leagues.create');
    }

    /**
     * Store a newly created League in storage.
     *
     * @param CreateLeagueRequest $request
     *
     * @return Response
     */
    public function store(CreateLeagueRequest $request)
    {
        $input = $request->all();

        $league = $this->leagueRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/leagues.singular')]));

        return redirect(route('leagues.index'));
    }

    /**
     * Display the specified League.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            Flash::error(__('messages.not_found', ['model' => __('models/leagues.singular')]));

            return redirect(route('leagues.index'));
        }

        return view('leagues.show')->with('league', $league);
    }

    /**
     * Show the form for editing the specified League.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            Flash::error(__('messages.not_found', ['model' => __('models/leagues.singular')]));

            return redirect(route('leagues.index'));
        }

        return view('leagues.edit')->with('league', $league);
    }

    /**
     * Update the specified League in storage.
     *
     * @param int $id
     * @param UpdateLeagueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeagueRequest $request)
    {
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            Flash::error(__('messages.not_found', ['model' => __('models/leagues.singular')]));

            return redirect(route('leagues.index'));
        }

        $league = $this->leagueRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/leagues.singular')]));

        return redirect(route('leagues.index'));
    }

    /**
     * Remove the specified League from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $league = $this->leagueRepository->find($id);

        if (empty($league)) {
            Flash::error(__('messages.not_found', ['model' => __('models/leagues.singular')]));

            return redirect(route('leagues.index'));
        }

        $this->leagueRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/leagues.singular')]));

        return redirect(route('leagues.index'));
    }
}
