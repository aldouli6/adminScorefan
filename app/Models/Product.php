<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version June 15, 2020, 11:35 pm UTC
 *
 * @property boolean $enabled
 * @property integer $category_id
 * @property string $name
 * @property string $img_url
 * @property number $price
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'category_id',
        'name',
        'img_url',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'category_id' => 'integer',
        'name' => 'string',
        'img_url' => 'string',
        'price' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'img_url' => 'required',
        'price' => 'required'
    ];

    
}
