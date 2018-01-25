<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
				{
					return [];
				}
			case 'POST':
				{
					return
						[
							'title' => 'bail|required|alpha_spaces|min:3|max:50',
							'content' => 'required|min:10'
						];
				}

			case'PUT':
			case 'PATCH':
				{
					$user_id = $this->route()->getParameter('users');

					return
						[
							'name' => 'bail|required|alpha_num|min:3|max:20',
							'email' => 'required|email|unique:users,email,'.$user_id,
							'password' => 'min:3|confirmed',
							'password_confirmation' => '',
							'role_id' => 'required',
							'is_active' => 'required'
						];
				}

			default: break;
		}
	}
}
