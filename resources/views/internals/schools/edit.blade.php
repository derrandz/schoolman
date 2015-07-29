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
                    'route'  => array('admin.schools.update', $instance->id),
                    'method' => 'PUT'
                            ]) 
            !!}

                    {!! csrf_field() !!}

                    <div class="form-groups">
                        <div class="form-label"> Name </div>
                        <input class="form-controls" type="text" name="name" value="{{ $instance->name }}">
                    </div>

                    <div class="form-groups">
                        <div class="form-label"> Code </div>
                        <input class="form-controls" type="text" name="code" value="{{ $instance->code }}">
                    </div>

                    <div class="form-groups">
                        <button type="submit">Save</button>
                    </div>

            {!! Form::close() !!}
            </div>
        </div>
    @stop


