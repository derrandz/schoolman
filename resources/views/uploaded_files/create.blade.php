<!-- resources/views/auth/create.blade.php -->
@extends('layouts.main')
        
    @section('content')
    <script src="{{ URL::asset('vendor/dropzone/dist/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{asset("vendor/dropzone/dist/min/dropzone.min.css")}}" media="all">


        <div class="container">
            <div class="content">
                <div class="title">Records Create Page</div>
                <div class="content">

                    <button type="submit" id="submit-all">Upload</button>

                    {!! Form::open(['route'=> 'uploaded_files.store',
                                      'method' => 'POST',
                                      'class' => 'dropzone',
                                      'id'  => 'my-awesome-dropzone',
                                      'enctype' => 'multipart/form-data',
                                      'files' => true]) 
                    !!}
                    
                    <div class="dropzone-previews"></div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

<script>

Dropzone.options.myAwesomeDropzone = 
{

  autoProcessQueue: true,
  acceptedFiles: ".xls,.csv,.ods",
  addRemoveFiles: true,
  dictCancelUpload: 'Canceled',

      init: function() 
      {

          var submitButton = document.querySelector("#submit-all")
          myDropzone = this; // closure

          submitButton.addEventListener("click", function() {
          myDropzone.processQueue(); // Tell Dropzone to process all queued files.
          });

          // You might want to show the submit button only when 
          // files are dropped here:
          this.on("addedfile", function() {
          // Show submit button here and/or inform user to click it.
          });

      }

};

</script>
    
  @stop