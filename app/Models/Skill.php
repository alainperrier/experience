<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Skill
 * @package App\Models
 * @version June 5, 2017, 7:01 pm UTC
 */
class Skill extends Model
{
    use SoftDeletes;

    public $table = 'skills';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'description',
        'level'
    ];

    public $guarded = [
        'user_id'
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
        'level' => 'integer|nullable|between:0,5'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function subSkills()
    {
        return $this->hasMany(\App\Models\SubSkill::class, 'skill_id');
    }
}
