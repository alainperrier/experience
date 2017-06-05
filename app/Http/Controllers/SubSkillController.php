<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubSkillRequest;
use App\Http\Requests\UpdateSubSkillRequest;
use App\Repositories\SubSkillRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SubSkillController extends AppBaseController
{
    /** @var  SubSkillRepository */
    private $subSkillRepository;

    public function __construct(SubSkillRepository $subSkillRepo)
    {
        $this->subSkillRepository = $subSkillRepo;
    }

    /**
     * Display a listing of the SubSkill.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subSkillRepository->pushCriteria(new RequestCriteria($request));
        $subSkills = $this->subSkillRepository->all();

        return view('sub_skills.index')
            ->with('subSkills', $subSkills);
    }

    /**
     * Show the form for creating a new SubSkill.
     *
     * @return Response
     */
    public function create()
    {
        return view('sub_skills.create');
    }

    /**
     * Store a newly created SubSkill in storage.
     *
     * @param CreateSubSkillRequest $request
     *
     * @return Response
     */
    public function store(CreateSubSkillRequest $request)
    {
        $input = $request->all();

        $subSkill = $this->subSkillRepository->create($input);

        Flash::success('Sub Skill saved successfully.');

        return redirect(route('subSkills.index'));
    }

    /**
     * Display the specified SubSkill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subSkill = $this->subSkillRepository->findWithoutFail($id);

        if (empty($subSkill)) {
            Flash::error('Sub Skill not found');

            return redirect(route('subSkills.index'));
        }

        return view('sub_skills.show')->with('subSkill', $subSkill);
    }

    /**
     * Show the form for editing the specified SubSkill.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subSkill = $this->subSkillRepository->findWithoutFail($id);

        if (empty($subSkill)) {
            Flash::error('Sub Skill not found');

            return redirect(route('subSkills.index'));
        }

        return view('sub_skills.edit')->with('subSkill', $subSkill);
    }

    /**
     * Update the specified SubSkill in storage.
     *
     * @param  int              $id
     * @param UpdateSubSkillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubSkillRequest $request)
    {
        $subSkill = $this->subSkillRepository->findWithoutFail($id);

        if (empty($subSkill)) {
            Flash::error('Sub Skill not found');

            return redirect(route('subSkills.index'));
        }

        $subSkill = $this->subSkillRepository->update($request->all(), $id);

        Flash::success('Sub Skill updated successfully.');

        return redirect(route('subSkills.index'));
    }

    /**
     * Remove the specified SubSkill from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subSkill = $this->subSkillRepository->findWithoutFail($id);

        if (empty($subSkill)) {
            Flash::error('Sub Skill not found');

            return redirect(route('subSkills.index'));
        }

        $this->subSkillRepository->delete($id);

        Flash::success('Sub Skill deleted successfully.');

        return redirect(route('subSkills.index'));
    }
}
