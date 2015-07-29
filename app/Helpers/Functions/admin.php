<?php

    function getCurrentSchool()
    {

        $request = app()->request;

        $school_id   = $request->school_id;

        if( !( is_null($school_id) ) )
        {
            if($school_id == -1)
            {
                return $school_id;
            }

            $school = SchoolsRepoHelperFindQuery($school_id, new SchoolsRepoInterface);

            if( !is_null(connectToDatabase(['database' => "database_of_$school->name"])))
            {
                return $school;
            }
            
            return null;
        }    
        
        return null;
    }




    function getCurrentSchoolName()
    {
        if(!(is_null($getCurrentSchool = getCurrentSchool())))
        {
            return $getCurrentSchool->name;
        }

        return null;
    }




    function CurrentSchoolId()
    {
       if(!(is_null($getCurrentSchool = getCurrentSchool())))
        {
            return $getCurrentSchool->id;
        }

        return null;
    }