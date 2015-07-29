<!-- resources/views/organisms/register.blade.php -->
@extends('layouts.main')

    @section('content')
        <div class="container-fluid">
            <div class="content">
                <div class="title">Edit School</div>
            </div>
            <div class="content">
            {!! 
                Form::open([
                    'route'  => array('admin.users.update', $instance->id),
                    'method' => 'PUT'
                            ]) 
            !!}

                    {!! csrf_field() !!}

                    <input hidden type="text" name="id" value="{{ $instance->id }}">

                  <div class="form-group">
                        <div class="form-label"> Name </div>
                        <input class="form-control" type="text" name="name" value="{{ $instance->name }}">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Email</div>
                        <input class="form-control" type="email" name="email" value="{{ $instance->email }}">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Password </div>
                        <input class="form-control" type="password" name="password">
                    </div>

                    <div class="form-group">
                        <div class="form-label"> Confirm Password </div>
                        <input class="form-control" type="password" name="password_confirmation">
                    </div>


                    <div class="form-group">
                        <div class="form-label"> Choose Role </div>
                        {!! Form::select("role", $roles,null, ["class" => "form-control"]) !!}
                    </div>

                    @if(@currentUserIsSuperAdmin())
                    <div class="form-group">
                        <div class="form-label"> Choose School</div>
                        {!! Form::select("school_id", $schools,null, ["class" => "form-control"]) !!}
                    </div>
                    @endif
                    <div class="form-groups">
                        <button type="submit">Save</button>
                    </div>

            {!! Form::close() !!}
            </div>
        </div>
    @stop


