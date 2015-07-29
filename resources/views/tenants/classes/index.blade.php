<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <h1>Classes</h1>
        <div class="panel panel-info">
          <td>{!! Html::linkRoute('schools.classes.create', "New Class") !!}</td>
        </div>
        <div class="container">
            <div class="content">
                <div class="content">
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
                          <td>Description and blabla</td>
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
        </div>
    @stop
