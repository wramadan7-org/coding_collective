<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;

class EducationController extends BaseController
{
    /**
     * Display all list of education
     * 
     * @return \App\Http\Resources\EducationResource
     */
    public function index() {
        $educations = Education::all();

        return $this->sendResponse(EducationResource::collection($educations), 'Education list.');
    }

    /**
     * Store/Create education
     * 
     * @param \App\Http\Requests\Education\StoreEducationRequest $request
     * @return \App\Http\Resources\EducationResource
     */
    public function store(StoreEducationRequest $request) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $education = new Education();
        $education->education_name = $request['education'];
        $education->user_id = $request['user_id'];
        $education->save();

        return $this->sendResponse(new EducationResource($education), 'Education create successfuly.');
    }

    /**
     * Show ducation by ID
     * 
     * @param int $id
     * @return \App\Http\Resources\EducationResource
     */
    public function show($id) {
        $education = Education::find($id);

        if (is_null($education)) {
            return $this->sendError('Education not found.');
        }

        return $this->sendResponse(new EducationResource($education), 'Education retrieved successfully.');
    }

    /**
     * Update the spesified resource in storage
     * 
     * @param \App\Http\Requests\Education\UpdateEducationRequest $request
     * @param Education $education
     * @return \App\Http\Resources\EducationResource
     */
    public function update(UpdateEducationRequest $request, Education $education) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $education->education_name = $request['education'];
        $education->user_id = $request['user_id'];
        $education->save();

        return $this->sendResponse(new EducationResource($education), 'Education update successfully.');
    }

    /**
     * Remove spesified resource from storage
     * 
     * @param Education $education
     * @return array
     */
    public function destroy(Education $education) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $education->delete();

        return $this->sendResponse([], 'Education delete successfully.');
    }
}
