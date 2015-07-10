@extends('layouts.main')

@section('content')
	<div class="table-responsive">
		<fieldset>
			<label for="Role">Create Access Level (Role)</label>
			<div class="row-fluid">
				<input type="text">
				<div class="row-fluid">
					<table class="table table-striped">
						  <thead>
						    <tr>
								@foreach($permissions as $permission)
							      <th>{!! $permission->name !!}</th>
							      @endforeach
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
								@foreach($permissions as $permission)
								<td>{!! Form::checkbox($permission->name, $permission->id) !!}</td>
							    @endforeach
						    </tr>
						  </tbody>
						</table>
				</div>	
			</div>
		</fieldset>
	</div>
@stop