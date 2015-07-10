@extends('layouts.main')

@section('content')
{!! Form::open(['route' => 'roles_and_permissions.permission.store',
				'method' => 'POST']) !!}
	<div class="table-responsive">
		<a href="#"><button><i class="glyphicon glyphicon-plus"></i>New Permission</button></a>
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th>Name(lower-case)</th>
		      <th>Display Name (Human Name)</th>
		      <th>Description</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>{!! Form::Input('text', "name") !!}</td>
		      <td>{!! Form::Input('text', "display_name") !!}</td>
		      <td>{!! Form::Input('text', "description") !!}</td>
		      <td>
				{!! Form::submit('Save', array('class' => 'btn btn-info')) !!}
		      </td>
		    </tr>
		  </tbody>
		</table>
	</div>
{!! Form::close() !!}
@stop