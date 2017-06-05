<?php

namespace App\Repositories;

use App\Models\Skill;
use InfyOm\Generator\Common\BaseRepository;

class SkillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'level'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Skill::class;
    }

}
