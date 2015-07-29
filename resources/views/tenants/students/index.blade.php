<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
      {!! Html::linkRoute('admin.schools.create', "New School") !!}
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
                        @foreach($all as $school)
                        <tr>
                          <td>{!! Html::linkRoute('admin.schools.show', $school->id, array('id' => $school->id ) ) !!}</td>
                          <td><?= $school->name ?></td>
                          <td><?= $school->code ?></td>
                          <td><i class="glyphicon glyphicon-trash"></i>{!! Html::linkRoute('admin.schools.delete', "delete", array('id' => $school->id ) ) !!}</td>
                          <td><i class="glyphicon glyphicon-edit"></i>{!! Html::linkRoute('admin.schools.edit', "edit", array('id' => $school->id ) ) !!}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
