<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Requests\Skill\StoreSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use Illuminate\Support\Facades\Auth;

class SkillController extends BaseController
{
    /**
     * List of Skill
     * 
     * @return \App\Http\Resources\SkillResource
     */
    public function index() {
        $skill = Skill::all();

        return $this->sendResponse(SkillResource::collection($skill), 'List skill.');
    }

    /**
     * Store/Create Skill
     * 
     * @param \App\Http\Requests\Skill\StoreSkillRequest $request
     * @return \App\Http\Resources\SkillResource
     */
    public function store(StoreSkillRequest $request) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $skill = new Skill();
        $skill->skill_name = $request['skill'];
        $skill->user_id = $request['user_id'];
        $skill->save();

        return $this->sendResponse(new SkillResource($skill), 'Skill create successfully.');
    }

    /**
     * Show Skill by ID
     * 
     * @param int $id
     * @return \App\Http\Resources\SkillResource
     */
    public function show($id) {
        $skill = Skill::find($id);

        if (is_null($skill)) {
            return $this->sendError('Skill not found.');
        }

        return $this->sendResponse(new SkillResource($skill), 'Skill retriveved successfully.');
    }

    /**
     * Update spesified Skill in storage
     * 
     * @param \App\Http\Requests\Skill\UpdateSkillRequest $request
     * @param Skill $skill
     * @return \App\Http\Resources\SkillResource
     */
    public function update(UpdateSkillRequest $request, Skill $skill) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $skill->skill_name = $request['skill'];
        $skill->user_id = $request['user_id'];
        $skill->save();

        return $this->sendResponse(new SkillResource($skill), 'Skill update successfully.');
    }

    /**
     * Remove spesified Skill resource from storage
     * 
     * @param Skill $skill
     * @return array
     */
    public function destroy(Skill $skill) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $skill->delete();

        return $this->sendResponse([], 'Skill delete successfully.');
    }
}
