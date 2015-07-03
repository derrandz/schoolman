@extends('layouts.main')

    @section('content')
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Current Students Number</h4>
                <span class="text-muted"> Count </span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#file_id</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Grade</th>
                </tr>
              </thead>
              <tbody>
              @foreach(current_user()->files as $file)
                @foreach($file->students as $student)
                <tr>
                  <td><?= $file->id?></td>
                  <td><?= $student->name?></td>
                  <td><?= $student->age?></td>
                  <td><?= $student->grade?></td>
                </tr>
                @endforeach
              @endforeach
              </tbody>
            </table>
          </div>
    @stop

