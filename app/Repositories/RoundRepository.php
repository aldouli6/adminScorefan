<?php

namespace App\Repositories;

use App\Models\Round;
use App\Repositories\BaseRepository;

/**
 * Class RoundRepository
 * @package App\Repositories
 * @version June 17, 2020, 9:47 pm UTC
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
