<!-- resources/views/organisms/register.blade.php -->
@extends('layouts.main')

    @section('content')
        <div class="container-fluid">
            <div class="content">
                <div class="title">Delete School</div>
                <p><strong><?= $instance->name ?></strong></p>
            </div>
            <div class="content">
                <h2>Are you sure you want to delete this school?</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                 {!! 
                    Form::open([
                        'route'  => array('admin.schools.destroy', $instance->id),
                        'method' => 'DELETE'
                                ]) 
                !!}

                    <div class="form-groups">
                        <button type="submit"><i class="glyphicon glyphicon-ok" style="color:green;"></i></button>
                    </div>
                {!! csrf_field() !!}
                {!! Form::close() !!}
                    <a href="/admin/schools/index"><button><i class="glyphicon glyphicon-remove" style="color:red;"></i></button></a>

                </div>
            </div>
        </div>
    @stop


