<!-- resources/views/organisms/register.blade.php -->
@extends('layouts.main')

    @section('content')

    <h1>UNDER MAINTANANCE </h1>
       <!--  <div class="container-fluid">
            <div class="content">
                <div class="title">Create Class</div>
            </div>
            <div class="content">
            {!! 
                Form::open([
                    'route'  => array('0' => 'schools.classes.store'),
                    'method' => 'POST',
                            ]) 
            !!}
            
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-label"> Name </div>
                        <input class="form-control" type="text" name="name">

                        <div class="form-label"> Year </div>
                        <input class="form-control" type="text" name="year">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Grade </div>
                        <input class="form-control" type="text" name="grade">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Starts_at </div>
                        <input class="form-control" type="text" name="start_at">
                    </div>

                    <div class="form-group">
                        <button type="submit">Create</button>
                    </div>

            {!! Form::close() !!}
            </div>
        </div> -->
    @stop


