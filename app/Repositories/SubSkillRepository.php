<?php

namespace App\Repositories;

use App\Models\SubSkill;
use InfyOm\Generator\Common\BaseRepository;

class SubSkillRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'level',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubSkill::class;
    }
}
