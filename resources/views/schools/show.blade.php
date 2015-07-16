<!-- resources/views/organisms/show.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
        <div class="container">
                <div class="title">Organisations</div>
                <div class="content">
                    <div class="row">

                      <div class="col-md-4">
                      <p>Users</p>
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
                                @if( !empty($users) )
                                  @foreach($users as $user)
                                  <tr>
                                    <td><?= $user->id ?></td>
                                    <td><?= $user->email ?></td>
                                    <td>Links</td>
                                  </tr>
                                  @endforeach
                                @else
                                <tr>
                                  <td>No User so far</td>
                                </tr>
                                @endif
                              </tbody>
                            </table>
                        </div>
                      </div>

                      <div class="col-md-4">
                      <p>Teachers</p>
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
                                   @if( !empty($teachers) )
                                      @foreach($teachers as $teacher)
                                      <tr>
                                        <td><?= $teacher->id ?></td>
                                        <td><?= $teacher->name?></td>
                                        <td>Links</td>
                                      </tr>
                                      @endforeach
                                    @else
                                    <tr>
                                      <td>No User so far</td>
                                    </tr>
                                    @endif
                                </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                </div>
        </div>
    @stop
