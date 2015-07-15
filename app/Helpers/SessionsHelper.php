<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Auth;

class SessionsHelper extends Model
{

    public static function isInit()
    {
        return Session::get('is_init');
    }

    public static function init()
    {
    	Session::put('user', 'empty');
    	Session::put('is_auth', false);
        Session::put('is_init', true);
    }

    public static function registerLogin()
    {
    	Session::put('user', Auth::user() );
    	Session::put('is_auth', true);
    }

    public static function registerLogout()
    {
    	Session::put('user', null );
    	Session::put('is_auth', false);	
    }

    public static function isLogged()
    {
    	return Session::get('is_auth');
    }

    public static function getAuthUser()
    {
    	return Session::get('user');
    }
}