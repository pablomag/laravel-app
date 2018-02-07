<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('alpha_spaces', function($attribute, $value)
		{
			return preg_match('/^[\pL\s]+$/u', $value);
		});
    }

    public function register()
    {
        //
    }
}
