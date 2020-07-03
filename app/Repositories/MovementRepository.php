<?php

namespace App\Repositories;

use App\Models\Movement;
use App\Repositories\BaseRepository;

/**
 * Class MovementRepository
 * @package App\Repositories
 * @version July 3, 2020, 12:51 am UTC
*/

class MovementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'product_id',
        'user_id',
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
