<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 * @package App\Models
 * @version June 14, 2020, 10:31 pm UTC
 *
 * @property string $name
 * @property boolean $enabled
 */
class State extends Model
{
    use SoftDeletes;

    public $table = 'states';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'enabled'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'enabled' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
