<!-- resources/views/auth/create.blade.php -->
@extends('layouts.main')
        
    @section('content')
    <script src="{{ URL::asset('vendor/dropzone/dist/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{asset("vendor/dropzone/dist/min/dropzone.min.css")}}" media="all">
        <div class="container-fluid">
            <div class="content">
                <div class="content">

 {!! Form::open(['route'=> 'schools.files.store',
                                      'method' => 'POST',
                                      'class' => 'dropzone',
                                      'id'  => 'my-awesome-dropzone',
                                      'enctype' => 'multipart/form-data',
                                      'files' => true]) 
                    !!}
                    {!! csrf_field() !!}
                    
                      <div class="dropzone-previews"></div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="table table-striped" class="files">
          <div id="template" class="file-row">
            <!-- This is used as the file preview template -->
            <div>
              <span class="preview">
                <img data-dz-thumbnail /></span>
              </div>
              <div>
                <p class="name" data-dz-name></p>
                <strong class="error text-danger" data-dz-errormessage></strong>
              </div>

              <div>
              
              <div id="buttons">
                 <button id="submit-all" class="btn btn-primary start" style="display:none;">
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start Upload</span>
                </button>

                <button data-dz-remove class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
                </button>
              </div>

                @if( ActionIsCreateTeachersFromFiles() )

                   {!! Form::open(['route'=> 'schools.files.store_teachers',
                                      'method' => 'POST',
                                      'id'  => 'create-teachers',
                                      'enctype' => 'multipart/form-data']) 
                    !!}
                    
                      <button id="createModelsSubmitButton" type="submit" class="btn btn-success" style="display:none;">
                        <i class="glyphicon glyphicon-upload"></i>
                      </button>

                  {!! Form::close() !!}

                @else
                  @if( ActionIsCreateStudentsFromFiles() )

                   {!! Form::open(['route'=> 'schools.files.store_students',
                                      'method' => 'POST',
                                      'id'  => 'create-teachers',
                                      'enctype' => 'multipart/form-data']) 
                    !!}
                    
                      <button id="createModelsSubmitButton" type="submit" class="btn btn-success" style="display:none;">
                        <i class="glyphicon glyphicon-upload"></i>
                      </button>

                  {!! Form::close() !!}

                  @else
                    @if( ActionIsCreateClassesFromFiles() )

                     {!! Form::open(['route'=> 'schools.files.store_classes',
                                      'method' => 'POST',
                                      'id'  => 'create-teachers',
                                      'enctype' => 'multipart/form-data']) 
                    !!}
                    
                      <button id="createModelsSubmitButton" type="submit" class="btn btn-success" style="display:none;">
                        <i class="glyphicon glyphicon-upload"></i>
                      </button>

                  {!! Form::close() !!}

                    @endif
                  @endif
                @endif

                <div id="successajax">
                </div>
              </div>
<script>

var model;

@if( ActionIsCreateTeachersFromFiles() )
  model = 'Teachers';
@else
  @if( ActionIsCreateStudentsFromFiles() )
    model = 'Students';
  @else
    @if( ActionIsCreateClassesFromFiles() )
      model = 'Classes';
    @endif
  @endif
@endif

function showSuccessButton()
{
  $('#successajax').html('<p><strong style="color:green"> '+ model +' Created Successfully.</strong></p>' + '{!! Html::linkRoute("schools.teachers.index", "Next" ) !!}');
}
</script>
<script>

Dropzone.options.myAwesomeDropzone = 
{

  autoProcessQueue: false,
  acceptedFiles: ".xls,.csv,.ods",
  addRemoveFiles: true,
  dictRemoveFile:'Remove',
  addRemoveLinks: true,

      init: function() 
      {

          var submitButton = document.querySelector("#submit-all");
          myDropzone = this; // closure

          submitButton.addEventListener("click", function() {
            myDropzone.processQueue(); // Tell Dropzone to process all queued files.
          });

          this.on("addedfile", function(file) {


              var submitbutton = $('#submit-all').css('display', 'inline');

          });

          this.on("success", function(file){
              var createTeachers = $('#createModelsSubmitButton');

              createTeachers.append('<span>Create ' + model + ' from file' + '</span>');
              createTeachers.css('display', 'inline');
          });

          this.on("removedfile", function(file){ 
            //do my thing
          });

      }

};
</script>
    
  @stop