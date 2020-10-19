<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Repositories\ResultRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Prediction;
use App\Models\Match;
use Flash;
use Response;

class ResultController extends AppBaseController
{
    /** @var  ResultRepository */
    private $resultRepository;

    public function __construct(ResultRepository $resultRepo)
    {
        $this->resultRepository = $resultRepo;
    }

    /**
     * Display a listing of the Result.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $results = $this->resultRepository->all();

        return view('results.index')
            ->with('results', $results);
    }

    /**
     * Show the form for creating a new Result.
     *
     * @return Response
     */
    public function create()
    {
        return view('results.create');
    }

    /**
     * Store a newly created Result in storage.
     *
     * @param CreateResultRequest $request
     *
     * @return Response
     */
    public function store(CreateResultRequest $request)
    {
        $input = $request->all();
        // dd($input);
        
        $res = ($input['result_local'] == $input['result_visitor'])?'E':(($input['result_local']>$input['result_visitor'])?'L':'V');
        // dd($res);
        $predictions = Prediction::where('match_id', $input['match_id'])->get();
        foreach ($predictions as $key => $prediction) {
            // dd($prediction);
            $prediction_points = 0;
            $prediction_result = ($prediction['prediction_local'] == $prediction['prediction_visitor'])?'E':(($prediction['prediction_local']>$prediction['prediction_visitor'])?'L':'V');
            // dd($prediction_result);
            $prediction_points += ($res==$prediction_result)?3:0;
            $prediction_points += ($input['result_local'] == $prediction['prediction_local']  &&  $input['result_visitor'] == $prediction['prediction_visitor'] )?2:0;
            
            Prediction::where('id', $prediction['id'])
            ->update(['points' => $prediction_points,'state_id' => 3]);
            Match::where('id', $prediction['match_id'])
            ->update(['state_id' => 3]);
        }
        $result = $this->resultRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/results.singular')]));

        return redirect(route('results.index'));
    }

    /**
     * Display the specified Result.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error(__('messages.not_found', ['model' => __('models/results.singular')]));

            return redirect(route('results.index'));
        }

        return view('results.show')->with('result', $result);
    }

    /**
     * Show the form for editing the specified Result.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error(__('messages.not_found', ['model' => __('models/results.singular')]));

            return redirect(route('results.index'));
        }

        return view('results.edit')->with('result', $result);
    }

    /**
     * Update the specified Result in storage.
     *
     * @param int $id
     * @param UpdateResultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResultRequest $request)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error(__('messages.not_found', ['model' => __('models/results.singular')]));

            return redirect(route('results.index'));
        }
        $input = $request->all();
        $res = ($input['result_local'] == $input['result_visitor'])?'E':(($input['result_local']>$input['result_visitor'])?'L':'V');
       
        $predictions = Prediction::where('match_id', $input['match_id'])->get();
        foreach ($predictions as $key => $prediction) {
            $prediction_points = 0;
            $prediction_result = ($prediction['prediction_local'] == $prediction['prediction_visitor'])?'E':(($prediction['prediction_local']>$prediction['prediction_visitor'])?'L':'V');
            $prediction_points += ($res==$prediction_result)?3:0;
            $prediction_points += ($input['result_local'] == $prediction['prediction_local']  &&  $input['result_visitor'] == $prediction['prediction_visitor'] )?2:0;
            Prediction::where('id', $prediction['id'])
          ->update(['points' => $prediction_points, 'state_id' => 3]);
            Match::where('id', $prediction['match_id'])
            ->update(['state_id' => 3]);
        }
        $result = $this->resultRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/results.singular')]));

        return redirect(route('results.index'));
    }

    /**
     * Remove the specified Result from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $result = $this->resultRepository->find($id);

        if (empty($result)) {
            Flash::error(__('messages.not_found', ['model' => __('models/results.singular')]));

            return redirect(route('results.index'));
        }

        $this->resultRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/results.singular')]));

        return redirect(route('results.index'));
    }
}
