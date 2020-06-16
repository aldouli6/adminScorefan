<?php

namespace App\Repositories;

use App\Models\Prediction;
use App\Repositories\BaseRepository;

/**
 * Class PredictionRepository
 * @package App\Repositories
 * @version June 15, 2020, 11:49 pm UTC
*/

class PredictionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state_id',
        'user_id',
        'match_id',
        'prediction_local',
        'prediction_visitor',
        'points'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Prediction::class;
    }
}
