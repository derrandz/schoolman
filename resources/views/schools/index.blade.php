<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <a href="/schools/create"><button><i class="glyphicon glyphicon-plus"></i>New Organisation</button></a>
        <div class="container">
            <div class="content">
                <div class="title">Records Show Page</div>
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
                        @foreach($schools as $school)
                        <tr>
                          <td>{!! Html::linkRoute('schools.show', $school->id, array('id' => $school->id ) ) !!}</td>
                          <td><?= $school->name?></td>
                          <td><?= $school->code?></td>
                          <td>
                             {!! Form::open(['route'=> 'schools.destroy',
                                      array('id' => $school->id),
                                      'method' => 'DELETE',
                                ]) !!}
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
