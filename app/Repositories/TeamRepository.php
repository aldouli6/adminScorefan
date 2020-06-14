<?php

namespace App\Repositories;

use App\Models\Team;
use App\Repositories\BaseRepository;

/**
 * Class TeamRepository
 * @package App\Repositories
 * @version June 14, 2020, 10:32 pm UTC
*/

class TeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'logo_url',
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
        return Team::class;
    }
}
