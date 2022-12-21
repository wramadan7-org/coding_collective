<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    /**
     * Display all list of user
     * 
     * @return \App\Http\Resources\UserResource
     */
    public function index() {
        // $users = User::with('role')->get();
        $users = User::all();

        return $this->sendResponse(UserResource::collection($users), 'User list.');
    }

    /**
     * Store/Create User
     * 
     * @param \App|Http\Request\User\StoreUserRequest $request
     * @return \App\Http\Resources\UserResource;
     */
    public function store(StoreUserRequest $request) {
        $access = isAdminOrSenior(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd.', [], 403);
        }
        
        $user = new User();
        $user->user_name = $request['name'];
        $user->user_email = $request['email'];
        $user->user_password = $request['password'];
        $user->user_birthday = $request['birthday'];
        $user->user_phone = $request['phone'];
        $user->user_last_position = $request['last_position'];
        $user->user_applied_position = $request['applied_position'];
        $user->role_id = $request['role_id'];
        $user->save();

        return $this->sendResponse(new UserResource($user), 'User create successfully.');
    }

    /**
     * Show user by ID
     * 
     * @param int $id
     * @return \App\Http\Resources\UserResource
     */
    public function show($id) {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
    }

    /**
     * Update the spesified resource in storage
     * 
     * @param \App\Http\Requests\User\UpdateUserRequest $request
     * @param User $user
     * @return \App\Http\Resources\UserResource
     */
    public function update(UpdateUserRequest $request, User $user) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }

        $user->user_name = $request['name'];
        $user->user_email = $request['email'];
        $user->user_password = $request['password'];
        $user->user_phone = $request['phone'];
        $user->user_birthday = $request['birthday'];
        $user->user_last_position = $request['last_position'];
        $user->user_applied_position = $request['applied_position'];
        $user->save();

        return $this->sendResponse(new UserResource($user), 'User update successfully.');
    }

    /**
     * Remove spesified resource from storage
     * 
     * @param User $user
     * @return array
     */
    public function destroy(User $user) {
        $access = isAdminOrSeniorOrUser(Auth::user()->role->role_name);

        if (!$access) {
            return $this->sendError('You\'r not admin or senior hrd or user.', [], 403);
        }
        
        $user->delete();

        return $this->sendResponse([], 'User delete successfully.');
    }
}
