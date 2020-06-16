<?php

namespace App\Repositories;

use App\Models\Result;
use App\Repositories\BaseRepository;

/**
 * Class ResultRepository
 * @package App\Repositories
 * @version June 16, 2020, 12:00 am UTC
*/

class ResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'match_id',
        'result_local',
        'result_visitor'
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
        return Result::class;
    }
}
