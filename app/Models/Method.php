<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Method
 * @package App\Models
 * @version June 15, 2020, 10:57 pm UTC
 *
 * @property boolean $enabled
 * @property string $name
 * @property string $public_key
 * @property string $private_key
 */
class Method extends Model
{
    use SoftDeletes;

    public $table = 'methods';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'name',
        'public_key',
        'private_key'
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
        'public_key' => 'string',
        'private_key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
