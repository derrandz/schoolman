<!-- resources/views/auth/create.blade.php -->
@extends('layouts.main')
        
    @section('content')
    <script src="{{ URL::asset('vendor/dropzone/dist/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{asset("vendor/dropzone/dist/min/dropzone.min.css")}}" media="all">
        <div class="container-fluid">
            <div class="content">
                <div class="content">

                    {!! Form::open(['route'=> 'tenants.files.store',
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
                <button id="submit-all" class="btn btn-primary start">
                  <i class="glyphicon glyphicon-upload"></i>
                  <span>Start Upload</span>
                </button>
                <button data-dz-remove class="btn btn-warning cancel">
                  <i class="glyphicon glyphicon-ban-circle"></i>
                  <span>Cancel</span>
                </button>
              </div>

<script>

Dropzone.options.myAwesomeDropzone = 
{

  autoProcessQueue: true,
  acceptedFiles: ".xls,.csv,.ods",
  addRemoveFiles: true,
  dictRemoveFile:'Remove',

      init: function() 
      {

          var submitButton = document.querySelector("#submit-all");
          myDropzone = this; // closure

          submitButton.addEventListener("click", function() {
          myDropzone.processQueue(); // Tell Dropzone to process all queued files.
          });

          // You might want to show the submit button only when 
          // files are dropped here:
          this.on("addedfile", function(file) {
            var _this=this;
            var removeButton = Dropzone.createElement("<button data-dz-remove " +
                        "class='del_thumbnail btn btn-default'><span class='glyphicon glyphicon-trash'></span></button>");


            removeButton.addEventListener("click", function(e) {

                e.defaultPrevented();
                e.stopPropagation();
            
                _this.removeFile(file);
            
            });
            
            file.previewElement.appendChild(removeButton);

          });

      }

};

</script>
    
  @stop