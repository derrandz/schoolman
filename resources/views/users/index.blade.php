<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <h1>Dashboard</h1>
        <div class="container">
            <div class="content">
                <div class="title">Dashboard</div>
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
                        @foreach($all as $user)
                        <tr>
                          <td>{!! Html::linkRoute('users.show', $user->id, array('id' => $user->id ) ) !!}</td>
                          <td><?= $user->name ?></td>
                          <td>
                            <!--  {!! Form::open( array(
                                                    'route' => array('users.destroy', $user->id)
                                                    , 'method' => 'DELETE')) !!} -->
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
