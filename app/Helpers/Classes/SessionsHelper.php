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
        Session::put('is_auth', true);
                
        if( Auth::user()->is_superadmin() )
        {
            Session::put('database', 'central_database' );
            Session::put('school_id', -1);
        }
        else
        {
            Session::put('database', Auth::user()->database_name() );
            Session::put('school_id', Auth::user()->school_id());            
        }
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

    

    public static function getAuthUserRole()
    {
        return Session::get('role');
    }

    

    public static function getAuthUserDatabase()
    {
        return Session::get('database');
    }

    

    public static function getAuthUserSchoolId()
    {
        return Session::get('school_id');
    }

    

    public static function setAuthUserDatabaseName($name)
    {
        Session::put('database', $name);
    }

    public static function setAuthUserSchoolId($id)
    {
        Session::put('school_id', $id);
    }


    public static function saveUploadedFiles(array $ids)
    {
        Session::put('files', $ids);
    }


    public static function getUploadedFilesIds()
    {
        return Session::get('files');
    }

    public static function forgetUploadedFiles()
    {
        Session::put('files', null);
    }
}
