<!-- resources/views/organisms/index.blade.php -->
<!DOCTYPE html>
@extends('layouts.main')

    @section('content')
        <div class="container">
          <div class="row">
            <div class="panel panel-info">
              <div class="panel panel-heading"><h3><strong>Dashboard</strong></h3></div>
              <div class="panel panel-body">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel panel-heading">Teachers</div>
                          <div class="panel panel-body">
                            <ul class="nav navbar">
                              <li>{!! Html::linkRoute('schools.files.create_teachers', "Create Teachers From File" ) !!}</li>
                              <li>{!! Html::linkRoute('schools.teachers.create', "Create Teachers Manually" ) !!}</li>
                              <li>{!! Html::linkRoute('schools.teachers.index', "See all" ) !!}</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel panel-heading">Students</div>
                          <div class="panel panel-body">
                            <ul class="nav navbar">
                              <li>{!! Html::linkRoute('schools.files.create_students', "Create Students From File" ) !!}</li>
                              <li>{!! Html::linkRoute('schools.students.create', "Create Students Manually" ) !!}</li>
                              <li>{!! Html::linkRoute('schools.students.index', "See all" ) !!}</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                    </div>         
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel panel-heading">Classes</div>
                          <div class="panel panel-body">
                            <ul class="nav navbar">
                              <li>{!! Html::linkRoute('schools.files.create_classes', "Create Classes From File" ) !!}</li>
                              <li>{!! Html::linkRoute('schools.classes.create', "Create Classes Manually" ) !!}</li>
                              <li>{!! Html::linkRoute('schools.classes.index', "See all" ) !!}</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel panel-heading">Files</div>
                          <div class="panel panel-body">
                            <p>States & Links</p>
                          </div>
                        </div>
                      </div>


                    </div>       
              </div>
            </div>
          </div>
        </div>
    @stop
