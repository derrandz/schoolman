<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <h1>tenants</h1>
      <td>{!! Html::linkRoute('schools.classes.create', "New class") !!}</td>
        <div class="container">

          @if(! count($all) )
          <p>No class record has been made so far.</p>
          @else

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>CODE</th>
                  <th>Controls</th>
                </tr>
              </thead>
              <tbody>

                @foreach($all as $class)
                <tr>
                  <td>{!! Html::linkRoute('schools.classes.show', $class->id, array('id' => $class->id, 'school_id' => CurrentUserSchoolId()) ) !!}</td>
                  <td><?= $class->first_name ?></td>
                  <td><?= $class->last_name ?></td>
                  <td><?= $class->serialcode ?></td>
                  <td><?= $class->birthdate ?></td>
                  <td><?= $class->hiredate ?></td>
                  <td>
                    {!! Form::open( array(
                    'route' => array('schools.classes.destroy', "school_id" => CurrentUserSchoolId(), "id" => $class->id )
                    , 'method' => 'DELETE')) !!}
                    {!! csrf_field() !!}

                    <a href="#"><button><i class="glyphicon glyphicon-plus"></i>Delete</button></a>
                    {!! Form::close() !!}

                  </td>
                  <td>
                    <a href="#"><button><i class="glyphicon glyphicon-plus"></i>Edit</button></a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
          @endif
    @stop



                   