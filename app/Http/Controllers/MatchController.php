<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Repositories\MatchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MatchController extends AppBaseController
{
    /** @var  MatchRepository */
    private $matchRepository;

    public function __construct(MatchRepository $matchRepo)
    {
        $this->matchRepository = $matchRepo;
    }

    /**
     * Display a listing of the Match.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $matches = $this->matchRepository->all();

        return view('matches.index')
            ->with('matches', $matches);
    }

    /**
     * Show the form for creating a new Match.
     *
     * @return Response
     */
    public function create()
    {
        return view('matches.create');
    }

    /**
     * Store a newly created Match in storage.
     *
     * @param CreateMatchRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchRequest $request)
    {
        $input = $request->all();

        $match = $this->matchRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/matches.singular')]));

        return redirect(route('matches.index'));
    }

    /**
     * Display the specified Match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matches.singular')]));

            return redirect(route('matches.index'));
        }

        return view('matches.show')->with('match', $match);
    }

    /**
     * Show the form for editing the specified Match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matches.singular')]));

            return redirect(route('matches.index'));
        }

        return view('matches.edit')->with('match', $match);
    }

    /**
     * Update the specified Match in storage.
     *
     * @param int $id
     * @param UpdateMatchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatchRequest $request)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matches.singular')]));

            return redirect(route('matches.index'));
        }

        $match = $this->matchRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/matches.singular')]));

        return redirect(route('matches.index'));
    }

    /**
     * Remove the specified Match from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $match = $this->matchRepository->find($id);

        if (empty($match)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matches.singular')]));

            return redirect(route('matches.index'));
        }

        $this->matchRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/matches.singular')]));

        return redirect(route('matches.index'));
    }
}
