<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Result
 * @package App\Models
 * @version June 16, 2020, 12:00 am UTC
 *
 * @property integer $match_id
 * @property integer $result_local
 * @property integer $result_visitor
 */
class Result extends Model
{
    use SoftDeletes;

    public $table = 'results';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'match_id',
        'result_local',
        'result_visitor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'match_id' => 'integer',
        'result_local' => 'integer',
        'result_visitor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'match_id' => 'required',
        'result_local' => 'required',
        'result_visitor' => 'required'
    ];

    
}
