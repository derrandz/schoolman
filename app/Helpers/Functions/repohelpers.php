<?php


    function SchoolsRepoHelperFind($id,SchoolsRepoInterface $school)
    {
        return $school->find($id);
    }    



    function SchoolsRepoHelperFindQuery($id, SchoolsRepoInterface $school)
    {
        return $school->findQuery($id);
    }



    function getDatabasNameOfSchool($schoolId)
    {
    	$database_repos = new DatabasesInstancesRepoInterface;

    	$database = $database_repos->getDatabaseInstanceBySchoolId($schoolId);
    	return $database->name;
    }