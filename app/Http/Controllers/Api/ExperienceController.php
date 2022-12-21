<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Experience;
use App\Http\Resources\ExperienceResource;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends BaseController
{
    /**
     * List of experience
     * 
     * @return \App\Http\Resources\ExperienceResource
     */
    public function index() {
        $experience = Experience::all();

        return $this->sendResponse(ExperienceResource::collection($experience), 'List experience.');
    }

    /**
     * Store/Create Experience
     * 
     * @param \App\Http\Requests\Experience\StoreExperienceRequest $request
     * @return \App\Http\Resources\ExperienceResource
     */
    public function store(StoreExperienceRequest $request) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $experience = new Experience();
        $experience->experience_name = $request['experience'];
        $experience->experience_position = $request['position'];
        $experience->experience_company = $request['company'];
        $experience->user_id = $request['user_id'];
        $experience->save();

        return $this->sendResponse(new ExperienceResource($experience), 'Experience create successfully.');
    }

    /**
     * Show Experience by ID
     * 
     * @param int $id
     * @return \App\Http\Resources\ExperienceResource
     */
    public function show($id) {
        $experience = Experience::find($id);

        if (is_null($experience)) {
            return $this->sendError('Experience not found.');
        }

        return $this->sendResponse(new ExperienceResource($experience), 'Experience retriveved successfully.');
    }

    /**
     * Update spesified Experience in storage
     * 
     * @param \App\Http\Requests\Experience\UpdateExperienceRequest $request
     * @param Experience $experience
     * @return \App\Http\Resources\ExperienceResource
     */
    public function update(UpdateExperienceRequest $request, Experience $experience) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $experience->experience_name = $request['experience'];
        $experience->experience_position = $request['position'];
        $experience->experience_company = $request['company'];
        $experience->user_id = $request['user_id'];
        $experience->save();

        return $this->sendResponse(new ExperienceResource($experience), 'Experience update successfully.');
    }

    /**
     * Remove spesified Experience resource from storage
     * 
     * @param Experience $experience
     * @return array
     */
    public function destroy(Experience $experience) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $experience->delete();

        return $this->sendResponse([], 'Experience delete successfully.');
    }
}
