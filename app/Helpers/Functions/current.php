<?php

    function CurrentUser()
    {
        $current_user = SessionsHelper::getAuthUser();

        if( $current_user == 'empty' || is_null($current_user))
        {
            return 'Not logged in.';
        }

        return $current_user->name;
    }



    function CurrentUserRole()
    {
        $role = SessionsHelper::getAuthUserRole();

        if( $role == 'empty' || is_null($role))
        {
            return 'Not logged in to set Role';
        }

        return $role->name;
    }




    function currentUserIsSuperAdmin()
    {
        return CurrentUserRole() == 'SUPERADMIN';
    }



    function CurrentUserDatabase()
    {
        $database = SessionsHelper::getAuthUserDatabase();

        if( $database == 'empty' || is_null($database))
        {
            return 'NotDbSetNotLoggedInYet';
        }
        
        return $database;
    }




    function CurrentUserSchoolId()
    {
        return SessionsHelper::getAuthUserSchoolId();
    }




    function setCurrentUserDatabaseName($name)
    {
        SessionsHelper::SetAuthUserDatabaseName($name);
    }




    function getCurrentUserDatabaseName()
    {
        return SessionsHelper::getAuthUserDatabase();
    }




    function setRequestSchoolId($id)
    {
        SessionsHelper::SetAuthUserSchoolId($id);
    }




    function getRequestSchoolId()
    {
        SessionsHelper::getAuthUserSchoolId();
    }