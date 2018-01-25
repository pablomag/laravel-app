<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
	[
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden =
	[
        'password', 'remember_token',
    ];

    public function getPosts()
	{
		return $this->hasMany('App\Post', 'user_id');
	}

    public function getRole()
	{
		return $this->belongsTo('App\Role', 'role_id');
	}

	public function getPhoto()
	{
		return $this->belongsTo('App\Photo', 'photo_id');
	}

	public function hasAdminRights()
	{
		if ($this->getRole->name == "administrator" && $this->is_active == 1)
		{
			return true;
		}

		return false;
	}
}
