<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models
 * @version June 15, 2020, 11:46 pm UTC
 *
 * @property string $description
 * @property integer $method_id
 * @property integer $state_id
 * @property integer $user_id
 * @property integer $product_id
 * @property number $total
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'method_id',
        'state_id',
        'user_id',
        'product_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'method_id' => 'integer',
        'state_id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'total' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required',
        'method_id' => 'required',
        'state_id' => 'required',
        'user_id' => 'required',
        'product_id' => 'required'
    ];

    
}
