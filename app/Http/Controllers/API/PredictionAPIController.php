<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePredictionAPIRequest;
use App\Http\Requests\API\UpdatePredictionAPIRequest;
use App\Models\Prediction;
use App\Models\Match;
use App\Repositories\PredictionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PredictionController
 * @package App\Http\Controllers\API
 */

class PredictionAPIController extends AppBaseController
{
    /** @var  PredictionRepository */
    private $predictionRepository;

    public function __construct(PredictionRepository $predictionRepo)
    {
        $this->predictionRepository = $predictionRepo;
    }

    /**
     * Display a listing of the Prediction.
     * GET|HEAD /predictions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $predictions = $this->predictionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        return $this->sendResponse(
            $predictions->toArray(),
            __('messages.retrieved', ['model' => __('models/predictions.plural')])
        );
    }
    public function roundPredictions(Request $request)
    {
        $matches = Match::where('round_id',$request->round_id)
            ->where('state_id','2')
            ->orderBy('date_time', 'asc')
            ->get();
        $predictions=array();
        
        foreach ($matches as $key => $match) {
            $prediction = Prediction::where('match_id',$match->id)
                            ->where('state_id','2')
                            ->where('user_id',$request->user_id)
                            ->first();
            if($prediction){
                $predictions[$match->id]=array("local"=>(string)$prediction->prediction_local , 
                                            "visitante"=>(string)$prediction->prediction_visitor);
            }  
        }
        return $this->sendResponse(
            $predictions,
            __('messages.retrieved', ['model' => __('models/predictions.plural')])
        );
    }
    /**
     * Store a newly created Prediction in storage.
     * POST /predictions
     *
     * @param CreatePredictionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePredictionAPIRequest $request)
    {
        $prediction = Prediction::updateOrCreate(
            ['user_id' =>$request->user_id, 'match_id' => $request->match_id],
            ['state_id' => 2,'points'=>$request->points,'prediction_visitor'=>$request->prediction_visitor, 'prediction_local'=>$request->prediction_local]
        );
        // $prediction = $this->predictionRepository->create($input);

        return $this->sendResponse(
            $prediction->toArray(),
            __('messages.saved', ['model' => __('models/predictions.singular')])
        );
    }

    /**
     * Display the specified Prediction.
     * GET|HEAD /predictions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Prediction $prediction */
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/predictions.singular')])
            );
        }

        return $this->sendResponse(
            $prediction->toArray(),
            __('messages.retrieved', ['model' => __('models/predictions.singular')])
        );
    }

    /**
     * Update the specified Prediction in storage.
     * PUT/PATCH /predictions/{id}
     *
     * @param int $id
     * @param UpdatePredictionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePredictionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Prediction $prediction */
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/predictions.singular')])
            );
        }

        $prediction = $this->predictionRepository->update($input, $id);

        return $this->sendResponse(
            $prediction->toArray(),
            __('messages.updated', ['model' => __('models/predictions.singular')])
        );
    }

    /**
     * Remove the specified Prediction from storage.
     * DELETE /predictions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Prediction $prediction */
        $prediction = $this->predictionRepository->find($id);

        if (empty($prediction)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/predictions.singular')])
            );
        }

        $prediction->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/predictions.singular')])
        );
    }
}
