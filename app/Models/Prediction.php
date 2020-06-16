<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prediction
 * @package App\Models
 * @version June 15, 2020, 11:49 pm UTC
 *
 * @property integer $state_id
 * @property integer $user_id
 * @property integer $match_id
 * @property integer $prediction_local
 * @property integer $prediction_visitor
 * @property number $points
 */
class Prediction extends Model
{
    use SoftDeletes;

    public $table = 'predictions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'state_id',
        'user_id',
        'match_id',
        'prediction_local',
        'prediction_visitor',
        'points'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'state_id' => 'integer',
        'user_id' => 'integer',
        'match_id' => 'integer',
        'prediction_local' => 'integer',
        'prediction_visitor' => 'integer',
        'points' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required',
        'user_id' => 'required',
        'match_id' => 'required',
        'prediction_local' => 'required',
        'prediction_visitor' => 'required',
        'points' => 'required'
    ];

    
}
