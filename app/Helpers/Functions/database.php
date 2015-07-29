<?php

    function connectToDatabase($params)
    {
        return DatabaseConnection::connectTo(['database' => $params['database']]);
    }





    function getAllDatabases()
    {
        $list = array();

        $databases= DB::connection('mysql')->table('database_instances')->get();

        foreach($databases as $db)
        {
            $list[] = $db->name;
        }


        return $list;
    }




    function ActualDatabase()
    {
        $connectionsArray = DatabaseConnection::$instances;

        if( !empty($connectionsArray) )
        {
            if(($database_name =  CurrentUserdatabase()) != "NotDbSetNotLoggedInYet" )
            {
                if(getControllerName() != 'DashboardController')
                {
                    return getCurrentUserDatabaseName();
                }

                return 'central_database';
            }
        }

        return DB::connection()->getDatabaseName();
    }