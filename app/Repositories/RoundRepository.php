<?php

namespace App\Repositories;

use App\Models\Round;
use App\Repositories\BaseRepository;

/**
 * Class RoundRepository
 * @package App\Repositories
 * @version June 11, 2020, 2:17 am UTC
*/

class RoundRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'name',
        'date_time_limit',
        'league_id',
        'tournament_id'
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
        return Round::class;
    }
}
