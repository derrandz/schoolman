<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <a href="/organisms/create"><button><i class="glyphicon glyphicon-plus"></i>New Organisation</button></a>
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
                        @foreach($orgs as $org)
                        <tr>
                          <td><?= $org->id?></td>
                          <td><?= $org->name?></td>
                          <td><?= $org->code?></td>
                          <td>
                  <a href="#"><button><i class="glyphicon glyphicon-plus"></i>Delete</button></a>
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
