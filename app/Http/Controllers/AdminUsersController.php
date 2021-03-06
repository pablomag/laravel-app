<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    public function index()
    {
    	$users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
    	$roles = Role::lists('name', 'id')->all();

		return view('admin.users.create', compact('roles'));
    }

    public function store(UsersRequest $request)
    {
    	$data = $request->all();

    	if($file = $request->file('file'))
    	{
    		$name = time()."_".$file->getClientOriginalName();

    		$file->move('images', $name);

    		$photo = Photo::create(['file' => $name]);

    		$data['photo_id'] = $photo->id;
		}

		$data['password'] = bcrypt($request->password);

		User::create($data);

		Session::flash('flash_message', 'The user has been created');

    	return redirect('/admin/users');
    }

    public function show($id)
    {
		//
    }

    public function edit($id)
    {
    	$user = User::findOrFail($id);
		$roles = Role::lists('name', 'id')->all();

		return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UsersRequest $request, $id)
    {
		$user = User::findOrFail($id);

		if($request->password == '')
		{
			$data = $request->except('password');
		} else {

			$data = $request->all();
			$data['password'] = bcrypt($request->password);
		}

		if($file = $request->file('file'))
		{
			if (file_exists(public_path().$user->getPhoto->file))
			{
				unlink(public_path().$user->getPhoto->file);
			}

			$name = time()."_".$file->getClientOriginalName();

			$file->move('images', $name);

			$photo = Photo::create(['file' => $name]);

			$data['photo_id'] = $photo->id;
		}

		$user->update($data);

		Session::flash('flash_message', 'The user has been updated');

		return redirect('/admin/users');
    }

    public function destroy($id)
    {
		$user = User::findOrFail($id);

		if (file_exists(public_path().$user->getPhoto->file))
		{
			unlink(public_path().$user->getPhoto->file);
		}

		$user->delete();

		Session::flash('flash_message', 'The user has been deleted');

		return redirect('/admin/users');
    }
}
