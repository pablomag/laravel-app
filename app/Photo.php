<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $url = "/images/";
	protected $fillable = ['file'];

	public function getFileAttribute($photo)
	{
		return $this->url.$photo;
	}
}
