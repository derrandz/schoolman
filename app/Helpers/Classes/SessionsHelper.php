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
        Session::put('school_id', 'empty');
        Session::put('is_init', true);
    }

    public static function registerLogin()
    {
    	Session::put('user', Auth::user() );
        Session::put('role', Auth::user()->role() );
        Session::put('database', Auth::user()->database_name() );
        Session::put('school_id', Auth::user()->school_id());
    	Session::put('is_auth', true);
    }

    public static function registerLogout()
    {
        Session::put('user', null );
        Session::put('role', null );
    	Session::put('database', null );
        Session::put('school_id', null);
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

    public static function getAuthSchoolId()
    {
        return Session::get('school_id');
    }

    public static function setAuthSchoolId($id)
    {
        Session::put('school_id', $id);
    }
}
