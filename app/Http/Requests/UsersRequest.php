<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
		[
            'name' => 'bail|required|alpha_num|min:3|max:20',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:3|confirmed',
			'password_confirmation' => 'required',
			'role_id' => 'required',
			'is_active' => 'required'
        ];
    }
}
