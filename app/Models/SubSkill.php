<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubSkill
 * @package App\Models
 * @version June 5, 2017, 7:17 pm UTC
 */
class SubSkill extends Model
{
    use SoftDeletes;

    public $table = 'sub_skills';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'level',
        'description',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'description' => 'nullable|max:500',
        'level' => 'nullable|integer|between:0,5'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function skill()
    {
        return $this->belongsTo(\App\Models\Skill::class, 'skill_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
