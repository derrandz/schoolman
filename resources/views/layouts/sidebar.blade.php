
          <ul class="nav nav-sidebar">
            <li class="active"><a href="/dashboard/index">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="/dashboard/schools">Schools</a></li>
            <li><a href="/dashboard/users">Users</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li></li>
            <li></li>
            <li></li>
          </ul>
         @if(is_logged())
            @if(currentUserIsSuperAdmin())
                <ul class="nav nav-sidebar">
                  <li >
                        <div style="padding-left:20px;">
                             {!! Form::open(['route' => array('dashboard.sidebar.setdatabase'), 'method' => 'POST', 'id' => "setdatabase"]) !!}

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

                @if(!isTenantSchoolSet())
                  <ul class="nav nav-sidebar">
                    <li>
                      <a href="#">No School Is Set Yet.</a>
                    </li>
                  </ul>
                @else
                    @if( !( is_null($tenant = TenantSchoolName() ) ) )
                        <ul class="nav nav-sidebar">
                          <li><a href=""><p><strong style="color:green;"><?= $tenant ?></strong></p></a></li>
                          <li>{!! Html::linkRoute('tenants.teachers.index', "Teachers" ) !!}</li>
                          <li>{!! Html::linkRoute('tenants.teachers.create', "Create Teachers" ) !!}</li>
                          <li></li>
                        </ul>
                    @else
                        <ul class="nav nav-sidebar">
                          <li><p><strong style="color:green;">You have to choose the school to see the links to actions</strong></p></li>
                        </ul>
                    @endif
               @endif
         @endif