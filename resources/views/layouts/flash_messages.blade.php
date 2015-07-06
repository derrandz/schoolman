               @if(Session::has('success'))
                  <div class="alert- alert-success">
                      <h2>{{ Session::get('flash_message') }}</h2>
                  </div>
              @elseif(Session::has('failure'))
                    <div class="alert alert-failure">
                      <h2>{{ Session::get('failure') }}</h2>
                  </div>
              @elseif(Session::has('warning'))
                    <div class="alert alert-success">
                      <h2>{{ Session::get('warning') }}</h2>
                  </div>
              @elseif(Session::has('info'))
                    <div class="alert alert-success">
                      <h2>{{ Session::get('info') }}</h2>
                  </div>
              @elseif(Session::has('regular'))
                    <div class="alert alert-success">
                      <h2>{{ Session::get('info') }}</h2>
                  </div>
              @endif