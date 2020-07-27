<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version July 27, 2020, 4:18 pm UTC
 *
 * @property boolean $enabled
 * @property string $name
 * @property string $img_url
 * @property boolean $affect_balance
 * @property number $pos_x
 * @property number $pos_y
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'name',
        'img_url',
        'affect_balance',
        'pos_x',
        'pos_y'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'name' => 'string',
        'img_url' => 'string',
        'affect_balance' => 'boolean',
        'pos_x' => 'double',
        'pos_y' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'pos_x' => 'required',
        'pos_y' => 'required'
    ];

    
}
