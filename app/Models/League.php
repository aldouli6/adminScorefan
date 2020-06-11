<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class League
 * @package App\Models
 * @version June 11, 2020, 1:22 am UTC
 *
 * @property boolean $enabled
 * @property string $name
 */
class League extends Model
{
    use SoftDeletes;

    public $table = 'leagues';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enabled' => 'boolean',
        'name' => 'string'
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
