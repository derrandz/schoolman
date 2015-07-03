<!-- resources/views/auth/show.blade.php -->
<!DOCTYPE html>
        @extends('layouts.main')
        @extends('layouts.main')
@extends('layouts.main')

    @section('content')
        <div class="container">
            <div class="content">
                <div class="title">Records Show Page</div>
                <div class="content">
                    @if( $record != NULL )
                        <p>Record has been found</p>
                    @else
                        <p>Could not find the record</p>
                    @endif
                </div>
            </div>
        </div>
    @stop

