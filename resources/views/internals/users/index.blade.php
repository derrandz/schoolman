<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <h1>Dashboard</h1>
      <td>{!! Html::linkRoute('admin.users.create', "New User") !!}</td>
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
                          <th>Role</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($all as $user)
                        <tr>
                          <td>{!! Html::linkRoute('admin.users.show', $user->id, array('id' => $user->id ) ) !!}</td>
                          <td><?= $user->name ?></td>
                          <td><?= $user->roles->first()->name ?></td>
                          <td>
                             {!! Form::open( array(
                                                    'route' => array('admin.users.destroy', $user->id)
                                                    , 'method' => 'DELETE')) !!}
                            {!! csrf_field() !!}

                          <a href="#"><button><i class="glyphicon glyphicon-trash"></i>Delete</button></a>
                           {!! Form::close() !!}

                          </td>
                          <td><i class="glyphicon glyphicon-edit"></i>{!! Html::linkRoute('admin.users.edit', "edit", array('id' => $user->id )) !!}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
