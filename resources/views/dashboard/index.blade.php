<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
    <h1>Dashboard</h1>
    <a href="#"><button><i class="glyphicon glyphicon-plus"></i></button></a>
    <a href="#"><button><i class="glyphicon glyphicon-plus"></i></button></a>
    <a href="#"><button><i class="glyphicon glyphicon-plus"></i></button></a>
        <div class="container">
            <div class="content">
                <div class="content">
                   <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>School</th>
                          <th>Number of Students</th>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                         <td>School Name</td>
                         <td>121</td>
                       </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
