<!-- resources/views/files/index.blade.php -->
@extends('layouts.main')

    @section('content')
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
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
                  <th>Path</th>
                  <th>Extension</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
              @foreach($files as $file)
                <tr>
                  <td><?= $file->id?></td>
                  <td><?= $file->name?></td>
                  <td><?= $file->path?></td>
                  <td><?= $file->extension?></td>
                  <td><?= $file->description?></td>
              @endforeach
              </tbody>
            </table>
          </div>
    @stop
