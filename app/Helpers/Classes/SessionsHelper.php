<?php

namespace App\Helpers\Classes;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

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
        Session::put('role', 'empty');
        Session::put('database', 'empty');
        Session::put('is_init', true);
    }

    public static function registerLogin()
    {
    	Session::put('user', Auth::user() );
        Session::put('role', Auth::user()->role() );
        Session::put('database', Auth::user()->school->database->name );
    	Session::put('is_auth', true);
    }

    public static function registerLogout()
    {
        Session::put('user', null );
        Session::put('role', null );
    	Session::put('database', null );
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

    public static function getAuthRole()
    {
        return Session::get('role');
    }

    public static function getAuthDatabase()
    {
        return Session::get('database');
    }
}
