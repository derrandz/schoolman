<!-- resources/views/organisms/show.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
        <div class="container">
                <div class="title">Users</div>
                <div class="content">
                    <div class="row">
                      <p>User</p>
                           <div class="table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td><?= $instance->name ?></td>
                                  <td><?= $instance->email ?></td>
                                  <td><?= $instance->roles->first()->name ?></td>
                                </tr>
                                </tbody>
                              </table>
                          </div>
                    </div>
                </div>
        </div>
    @stop
