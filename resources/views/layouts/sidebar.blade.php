
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
            @if( !( is_null( TenantSchoolName() ) ) )
                <ul class="nav nav-sidebar">
                  <li><a href=""><p><strong style="color:green;"><?= TenantSchoolName() ?></strong></p></a></li>
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