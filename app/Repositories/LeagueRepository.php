<?php

namespace App\Repositories;

use App\Models\League;
use App\Repositories\BaseRepository;

/**
 * Class LeagueRepository
 * @package App\Repositories
 * @version June 11, 2020, 1:22 am UTC
*/

class LeagueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'name'
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
        return League::class;
    }
}
