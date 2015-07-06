<!-- resources/views/organisms/show.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
        <div class="container">
                <div class="title">Organisations</div>
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
                        <tr>
                          <td><?= $org->id?></td>
                          <td><?= $org->name?></td>
                          <td><?= $org->code?></td>
                          <td>Links</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
