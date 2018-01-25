<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Category;
use App\Photo;

class Post extends Model
{
    protected $fillable = ['category_id', 'photo_id', 'title', 'content'];

    public function getUser()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function getCategory()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}

	public function getPhoto()
	{
		return $this->belongsTo('App\Photo', 'photo_id');
	}
}
