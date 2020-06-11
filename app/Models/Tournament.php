<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tournament
 * @package App\Models
 * @version June 11, 2020, 1:29 am UTC
 *
 * @property boolean $enabled
 * @property string $name
 * @property integer $league_id
 */
class Tournament extends Model
{
    use SoftDeletes;

    public $table = 'tournaments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'name',
        'league_id'
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
        'league_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'league_id' => 'required'
    ];

    
}
