<?php

namespace App\Repositories;

use App\Models\Movement;
use App\Repositories\BaseRepository;

/**
 * Class MovementRepository
 * @package App\Repositories
 * @version June 16, 2020, 12:03 am UTC
*/

class MovementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'product_id',
        'movement'
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
        return Movement::class;
    }
}
