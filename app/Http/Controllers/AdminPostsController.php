<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostsRequest;

use App\Post;
use App\Photo;
use App\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    public function index()
    {
		$posts = Post::all();

		return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
		$categories = Category::lists('name', 'id')->all();

		return view('admin.posts.create', compact('categories'));
    }

    public function store(PostsRequest $request)
    {
		$data = $request->all();

		if($file = $request->file('file'))
		{
			$name = time()."_".$file->getClientOriginalName();

			$file->move('images', $name);

			$photo = Photo::create(['file' => $name]);

			$data['photo_id'] = $photo->id;
		}

    	$user = Auth::user();

		$user->getPosts()->create($data);

		Session::flash('flash_message', 'The post has been created');

		return redirect('/admin/posts');

        return $request->all();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
