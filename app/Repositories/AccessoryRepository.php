<?php

namespace App\Repositories;

use App\Models\Accessory;
use App\Repositories\BaseRepository;

/**
 * Class AccessoryRepository
 * @package App\Repositories
 * @version July 23, 2020, 11:37 pm UTC
*/

class AccessoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'enabled',
        'user_id',
        'product_id',
        'category_id',
        'pos_x',
        'pos_y',
        'selected'
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
        return Accessory::class;
    }
}
