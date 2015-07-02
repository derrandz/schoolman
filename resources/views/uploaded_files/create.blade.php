<!DOCTYPE html>
<html>
    <head>
        <title>Laravel File Upload</title>

        <!-- <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->
        <script src="{{ URL::asset('vendor/dropzone/dist/dropzone.js') }}"></script>
        <link rel="stylesheet" href="{{asset("vendor/dropzone/dist/min/dropzone.min.css")}}" media="all">

        <style>

            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
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
    
    </body>
</html>