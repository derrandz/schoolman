<?php

use Illuminate\Support\Str;
use Illuminate\Container\Container;

    function vendor_path($path)
    {
        return base_path().'/vendor'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    function resources_path($path)
    {
        return base_path().'/resources'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }


    function HTTP_path($path)
    {
        return base_path().'/app/Http'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    function is_logged()
    {
    	return SessionsHelper::isLogged();
    }
    
    function current_user()
    {
        $current_user = SessionsHelper::getAuthUser();

        if( $current_user == 'empty' || is_null($current_user))
        {
            return 'Not logged in.';
        }

        return $current_user->name;
    }

    function current_user_role()
    {
        $role = SessionsHelper::getAuthRole();

        if( $role == 'empty' || is_null($role))
        {
            return 'Not logged in to set Role';
        }

        return $role->name;
    }

    function current_url()
    {
        return app()->request->url;
    }

    function current_route()
    {
        return app()->request->route;
    }

    function currentUserIsSuperAdmin()
    {
        return current_user_role() == 'SUPERADMIN';
    }

    function current_database()
    {
        $connectionsArray = DatabaseConnection::$instances;

        if( !empty($connectionsArray) )
        {
            if(($database_name =  current_user_database()) != "NotDbSetNotLoggedInYet" )
            {
                if(getControllerName() != 'DashboardController')
                {
                    return getCurrentDatabaseName();
                }

                return 'central_database';
            }
        }

        return DB::connection()->getDatabaseName();
    }

    function current_user_database()
    {
        $database = SessionsHelper::getAuthDatabase();

        if( $database == 'empty' || is_null($database))
        {
            return 'NotDbSetNotLoggedInYet';
        }
        
        return $database;
    }


    function set_database($params)
    {
        return DatabaseConnection::connectTo($params['database']);
    }


    function databases()
    {
        $list = array();

        $databases= DB::connection('mysql')->table('database_instances')->get();

        foreach($databases as $db)
        {
            $list[] = $db->name;
        }


        return $list;
    }

    function getControllerAndActionName()
    {
        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);

        list($controller, $action) = explode('@', $controller);

        return ['action' => $action, 'controller' => $controller];
    }

    function getControllerName()
    {
        $action = app('request')->route()->getAction();

        $controller = class_basename($action['controller']);

        list($controller, $action) = explode('@', $controller);

        return $controller;
    }

    function flash($type, $content)
    {
        $type_html_class = '';

            Session::flash('flash_message', $content);

            switch($type)
            {
                case "success" : $type_html_class = 'alert-success';
                break;
                
                case "notice" : $type_html_class = 'alert-info';
                break;

                case "danger" : $type_html_class = 'alert-danger';
                break;

                case "warning" : $type_html_class = 'alert-warning';
                break;

                case "primary" : $type_html_class = 'alert-primary';
                break;

                default:
                    $type_html_class = "text-info";
                    break;
            }

            Session::flash("flash_type", $type_html_class);

    }

    function getInput($attributes)
    {
        $input = array();

        foreach($attributes as $attr)
        {
            $input[(string)$attr] = Input::get( (string)$attr );
        }

        return $input;
    }

    function RedirectToRoute($route, $params = array())
    {
        return Redirect::route($route)->with($params);
    }

    function flash_lang($type, $lang, $params = null, $default = null)
    {
        flash($type, Lang::has($lang) ? Lang::get($lang, $params ? $params : []) : ($default ? $default : 'The default message was not set') );
    }

    function SchoolsRepoHelperFind($id,SchoolsRepoInterface $school)
    {
        return $school->find($id);
    }    

    function SchoolsRepoHelperFindQuery($id, SchoolsRepoInterface $school)
    {
        return $school->findQuery($id);
    }

    function TenantSchool()
    {
        $request = app()->request;
        /*
        |
        | This function returns the name of the school in which the management will take place.
        | Mainly for the SUPERADMIN as to make the actions appear on the dashboard,
        | This function might only stay for development time.
        |
        */
        $school_id   = $request->school_id;

        if( !( is_null($school_id) ) )
        {

            $current_database = current_database();

            if($school_id == -1)
            {
                return $school_id;
            }

            $school = SchoolsRepoHelperFindQuery($school_id, new SchoolsRepoInterface);

            if( !is_null(set_database(['database' => "database_of_$school->name"])))
            {
                return $school;
            }
            
            return null;
        }    
        
        return null;
    }

    function TenantSchoolName()
    {
        if(!(is_null($tenantschool = TenantSchool())))
        {
            return $tenantschool->name;
        }

        return null;
    }

    function TenantSchoolId()
    {
       if(!(is_null($tenantschool = TenantSchool())))
        {
            return $tenantschool->id;
        }

        return null;
    }

    function CurrentTenantSchoolId()
    {
        return SessionsHelper::getAuthSchoolId();
    }

    function setCurrentDatabaseName($name)
    {
        SessionsHelper::SetAuthDatabaseName($name);
    }

    function getCurrentDatabaseName()
    {
        return SessionsHelper::getAuthDatabase();
    }

    function setRequestSchoolId($id)
    {
        SessionsHelper::SetAuthSchoolId($id);
    }

    function IdAndNameSymArray($models)
    {
        $ids   = '' ; 
        $names = '' ; 

        foreach($models->all() as $model)
        {
            $ids[]   =  $model->id;
            $names[] =  $model->name;
        }

        $selectArray = array();
        $i           = 0;

        foreach($ids as $modelid)
        {
            $selectArray[ (string)$modelid ] = $names[$i];
            $i++;
        }

        return $selectArray;

    }

    function isTenantSchoolSet()
    {
        if(CurrentTenantSchoolId() == -1)
        {
            return false;
        }

        return true;
    }

    function selectArray($models)
    {
        $ids   = '' ; 
        $names = '' ; 

        foreach($models as $model)
        {
            $ids[]   =  $model->id;
            $names[] =  $model->name;
        }

        $selectArray = array();
        $i           = 0;

        foreach($ids as $modelid)
        {
            $selectArray[ (string)$modelid ] = $names[$i];
            $i++;
        }

        return $selectArray;

    }

    function getSchoolsArray()
    {
        $schools = DB::table('schools')->get();
        return selectArray($schools);
    }