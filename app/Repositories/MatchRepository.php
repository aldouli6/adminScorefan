<?php

namespace App\Repositories;

use App\Models\Match;
use App\Repositories\BaseRepository;

/**
 * Class MatchRepository
 * @package App\Repositories
 * @version June 14, 2020, 10:32 pm UTC
*/

class MatchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state_id',
        'team_local_id',
        'team_visitor_id',
        'round_id',
        'date_time'
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
        return Match::class;
    }
}
