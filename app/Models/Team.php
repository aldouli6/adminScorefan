<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team
 * @package App\Models
 * @version June 14, 2020, 10:32 pm UTC
 *
 * @property boolean $enabled
 * @property string $logo_url
 * @property string $name
 * @property integer $league_id
 */
class Team extends Model
{
    use SoftDeletes;

    public $table = 'teams';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'enabled',
        'logo_url',
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
        'logo_url' => 'string',
        'name' => 'string',
        'league_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'logo_url' => 'required',
        'name' => 'required',
        'league_id' => 'required'
    ];

    
}
