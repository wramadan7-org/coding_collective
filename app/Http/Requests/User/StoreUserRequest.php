<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,user_email,except,id',
            'password' => 'required',
            'phone' => 'required|numeric',
            'birthday' => 'required|date_format:Y/m/d',
            'last_position' => 'required',
            'applied_position' => 'required',
            'role_id' => 'required|integer'
        ];
    }
}
