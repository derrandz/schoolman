

         @if(is_logged())
           <ul class="nav nav-sidebar">
            <li class="active"><a href="/admin/dashboard">Overview <span class="sr-only">(current)</span></a></li>
            <li>{!! Html::linkRoute('admin.users.index', "Users" ) !!}</li>
            <li>{!! Html::linkRoute('admin.schools.index', "Schools" ) !!}</li>

          </ul>
          <ul class="nav nav-sidebar">
            <li></li>
            <li></li>
            <li></li>
          </ul>
            @if(currentUserIsSuperAdmin())
                <ul class="nav nav-sidebar">
                  <li >
                        <div style="padding-left:20px;">
                             {!! Form::open(['route' => array('admin.sidebar.setdatabase'), 'method' => 'POST', 'id' => "setdatabase"]) !!}

                        <div class="form-group">
                            <div class="form-label"><p>Choose School</p></div>
                            {!! Form::select("school_id", getSchoolsArray(), null, ["class" => "form-control", "id" => "schools"]) !!}
                        </div>

                        <div class="form-groups">
                          <button type="submit">Set</button>
                        </div>
                          {!! Form::close() !!}

                        </div>
                  </li>
                </ul>
              @endif

                @if(!isCurrentSchoolSet())
                @else
                    @if( !( is_null($tenant = getCurrentSchoolName() ) ) )
                        <ul class="nav nav-sidebar">
                          <li><a href=""><p><strong style="color:green;"><?= $tenant ?></strong></p></a></li>
                          <li>{!! Html::linkRoute('admin.schoolmanager', "Dashboard" ) !!}</li>
                          <li>{!! Html::linkRoute('schools.teachers.index', "Teachers" ) !!}</li>
                          <li>{!! Html::linkRoute('schools.students.index', "Students" ) !!}</li>
                          <li>{!! Html::linkRoute('schools.classes.index', "Classes" ) !!}</li>
                          <li></li>
                        </ul>
                    @else
                        <ul class="nav nav-sidebar">
                          <li><p><strong style="color:green;">There was an error during our connection to your school, please retry later</strong></p></li>
                        </ul>
                    @endif
               @endif
         @endif