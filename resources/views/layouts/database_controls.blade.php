 <p>Current Database <strong style="color:green;"><?php echo current_database() ?></strong></p> 
{!! Form::open(['route' => 'switch.database',
               'method' => 'GET']) 
!!}

{!! csrf_field() !!}

 <div class="form-groups">
 	<?php $databases = databases(); 
 		  $keys 	= array();
 		  $db_array = array();
 	 foreach($databases as $database)
 	 {
 	 	$keys[] = $database;
 	 }

 	 foreach($databases as $database)
 	 {
 	 	$db_array = array_fill_keys($keys, $database);
 	 }

 	?>
   {!! Form::select("database_name", $db_array, null, ["class" => "form-control"]) !!}
   {!! Form::submit('Change Database') !!}  
 </div>
{!! Form::close() !!}