<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersRequest;

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

		$data['password'] = bcrypt($request->getPassword());

		User::create($data);

    	return redirect('/admin/users');
    }

    public function show($id)
    {
		//
    }

    public function edit($id)
    {
		return view('admin.users.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
