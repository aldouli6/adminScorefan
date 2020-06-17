<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class League
 * @package App\Models
 * @version June 17, 2020, 9:51 pm UTC
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
