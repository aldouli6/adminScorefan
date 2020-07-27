<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Accessory
 * @package App\Models
 * @version July 23, 2020, 11:37 pm UTC
 *
 * @property boolean $enabled
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $category_id
 * @property integer $pos_x
 * @property integer $pos_y
 * @property boolean $selected
 */
class Accessory extends Model
{
    use SoftDeletes;

    public $table = 'accessories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'user_id',
        'product_id',
        'category_id',
        'pos_x',
        'pos_y',
        'selected'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'category_id' => 'integer',
        'pos_x' => 'integer',
        'pos_y' => 'integer',
        'selected' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'product_id' => 'required',
        'category_id' => 'required',
        'pos_x' => 'required',
        'pos_y' => 'required'
    ];

    
}
