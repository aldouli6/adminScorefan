<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version June 15, 2020, 11:08 pm UTC
 *
 * @property boolean $enabled
 * @property string $name
 * @property string $img_url
 * @property boolean $affect_balance
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
        'affect_balance'
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
        'affect_balance' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'img_url' => 'required'
    ];

    
}
