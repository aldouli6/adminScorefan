<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Match
 * @package App\Models
 * @version June 14, 2020, 10:32 pm UTC
 *
 * @property integer $state_id
 * @property integer $team_local_id
 * @property integer $team_visitor_id
 * @property integer $round_id
 * @property string $date_time
 */
class Match extends Model
{
    use SoftDeletes;

    public $table = 'matches';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'state_id',
        'team_local_id',
        'team_visitor_id',
        'round_id',
        'date_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state_id' => 'integer',
        'team_local_id' => 'integer',
        'team_visitor_id' => 'integer',
        'round_id' => 'integer',
        'date_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required',
        'team_local_id' => 'required',
        'team_visitor_id' => 'required',
        'round_id' => 'required',
        'date_time' => 'required'
    ];

    
}
