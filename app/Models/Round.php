<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Round
 * @package App\Models
 * @version June 17, 2020, 9:47 pm UTC
 *
 * @property boolean $enabled
 * @property string $name
 * @property string $date_time_limit
 * @property integer $league_id
 * @property integer $tournament_id
 */
class Round extends Model
{
    use SoftDeletes;

    public $table = 'rounds';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'name',
        'date_time_limit',
        'league_id',
        'tournament_id'
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
        'date_time_limit' => 'datetime',
        'league_id' => 'integer',
        'tournament_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'date_time_limit' => 'required',
        'league_id' => 'required',
        'tournament_id' => 'required'
    ];

    
}
