<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Accessory
 * @package App\Models
 * @version June 15, 2020, 11:54 pm UTC
 *
 * @property boolean $enabled
 * @property integer $user_id
 * @property integer $product_id
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
        'selected' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'product_id' => 'required'
    ];

    
}
