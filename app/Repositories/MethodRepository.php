<?php

namespace App\Repositories;

use App\Models\Method;
use App\Repositories\BaseRepository;

/**
 * Class MethodRepository
 * @package App\Repositories
 * @version June 15, 2020, 10:57 pm UTC
*/

class MethodRepository extends BaseRepository
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
        return Method::class;
    }
}
