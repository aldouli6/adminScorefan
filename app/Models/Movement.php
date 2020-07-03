<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Movement
 * @package App\Models
 * @version July 3, 2020, 12:51 am UTC
 *
 * @property string $description
 * @property integer $product_id
 * @property integer $user_id
 * @property number $movement
 */
class Movement extends Model
{
    use SoftDeletes;

    public $table = 'movements';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'product_id',
        'user_id',
        'movement'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'product_id' => 'integer',
        'user_id' => 'integer',
        'movement' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'product_id' => 'required',
        'user_id' => 'required',
        'movement' => 'required'
    ];

    
}
