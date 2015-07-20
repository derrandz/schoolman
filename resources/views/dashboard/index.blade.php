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
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                         <td>1</td>
                         <td>2</td>
                         <td>3</td>
                         <td>4</td>
                       </tr>
                        <tr>
                         <td>1</td>
                         <td>2</td>
                         <td>3</td>
                         <td>4</td>
                       </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    @stop
