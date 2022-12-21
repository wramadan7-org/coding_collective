<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\BaseController as BaseController;
use App\Models\Role;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Validator;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Facades\Auth;

class RoleController extends BaseController
{
    /**
     * Display all list of Role
     * 
     * @return \App\Http\Resources\RoleResource;
     */
    public function index() {
        $roles = Role::all();

        return $this->sendResponse(RoleResource::collection($roles), 'Role list.');
    }

    /**
     * Create/Store Role
     * 
     * @param \App\Http\Requests\StoreRoleRequest $request
     * @return \App\Http\Resources\RoleResource;
     */
    public function store(StoreRoleRequest $request) {
        $access = isAdminOrSenior(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd.', [], 403);
        }
        // Get all the Request and define in variable input
        // $input = $request->all();
        // $validator = Validator::make($input, [
        //     'role' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->error());
        // }

        $serialize = new Role();
        $serialize->role_name = $request['role'];
        $serialize->save();

        // $role = Role::create($serialize);

        return $this->sendResponse(new RoleResource($serialize), 'Role create successfully.', 201);
    }

    /**
     * Show Role by Id
     * 
     * @param int $id
     * @return \App\Http\Resources\RoleResource;
     */
    public function show($id) {
        $role = Role::find($id);

        if (is_null($role)) {
            return $this->sendError('Role not found.');
        }

        return $this->sendResponse(new RoleResource($role), 'Role retrieved successfully.');
    }

    /**
     * Update the spesified resource in storage
     * 
     * @param App\Http\Requests\Role\UpdateRoleRequest $request
     * @param Role $role
     * @return \App\Http\Resources\RoleResource;
     */
    public function update(UpdateRoleRequest $request, Role $role) {
        $access = isAdminOrSenior(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd.', [], 403);
        }
        // $input = $request->all();

        // $validator = Validator::make($input, [
        //     'role' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

        $role->role_name = $request['role'];
        $role->save();

        return $this->sendResponse(new RoleResource($role), 'Role update successfully.');
    }

    /**
     * Remove spesified resource from storage
     * 
     * @param int $id
     * @return array
     */
    public function destroy(Role $role) {
        $access = isAdminOrSenior(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd.', [], 403);
        }
        
        $role->delete();

        return $this->sendResponse([], 'Role deleted successfully.');
    }
}
