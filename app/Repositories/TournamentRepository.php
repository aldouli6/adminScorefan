<?php

namespace App\Repositories;

use App\Models\Tournament;
use App\Repositories\BaseRepository;

/**
 * Class TournamentRepository
 * @package App\Repositories
 * @version June 11, 2020, 1:29 am UTC
*/

class TournamentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'name',
        'league_id'
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
        return Tournament::class;
    }
}
