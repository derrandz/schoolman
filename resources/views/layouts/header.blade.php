    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PedagoManager</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

           @if( is_logged() )
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="/auth/logout">Logout</a></li>
            <li><a href="#"><strong style="color:green;"><?= CurrentUser() ?></strong></a></li>
            <li><a href="#"><strong style="color:green;"><?= CurrentUserRole() ?></strong></a></li>
           @else
           <li><a href="#"><p style="color:white"><strong>Please login</strong></p></a></li>
            <li><a href="/auth/login">Login</a></li>
           @endif
          </ul>
        </div>
      </div>
    </nav>

    