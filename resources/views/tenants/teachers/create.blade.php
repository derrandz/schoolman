<!-- resources/views/organisms/register.blade.php -->
@extends('layouts.main')

    @section('content')
        <div class="container-fluid">
            <div class="content">
                <div class="title">Create Teacher</div>
            </div>
            <div class="content">
            {!! 
                Form::open([
                    'route'  => array('0' => 'schools.teachers.store', 'school_id' => getCurrentSchoolId() ),
                    'method' => 'POST',
                            ]) 
            !!}
            
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="form-label"> First Name </div>
                        <input class="form-control" type="text" name="first_name">

                        <div class="form-label"> Last Name </div>
                        <input class="form-control" type="text" name="last_name">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Serial Code </div>
                        <input class="form-control" type="text" name="serialcode">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Birthdate </div>
                        <input class="form-control" type="text" name="birthdate">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Hiredate </div>
                        <input class="form-control" type="text" name="hiredate">
                    </div>

                    <div class="form-group">
                        <button type="submit">Create</button>
                    </div>

            {!! Form::close() !!}
            </div>
        </div>
    @stop


