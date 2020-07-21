<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version July 20, 2020, 11:58 pm UTC
 *
 * @property boolean $enabled
 * @property integer $category_id
 * @property string $name
 * @property string $img_url
 * @property number $price
 * @property number $score_saldo
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
        'price',
        'score_saldo'
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
        'price' => 'double',
        'score_saldo' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required'
    ];

    
}
