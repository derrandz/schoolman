<!-- resources/views/organisms/show.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
        <div class="container">
                <div class="title">Organisations</div>
                <div class="content">
                    <div class="row">
                      <div class="col-md-4">
                      <p>Students</p>
                           <div class="table-responsive">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Serial Code</th>
                                    <th>Birthdate</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  <tr>
                                    <td><?= $instance->first_name ?></td>
                                    <td><?= $instance->last_name ?></td>
                                    <td><?= $instance->serialcode?></td>
                                    <td><?= $instance->birthdate?></td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                </div>
        </div>
    @stop
