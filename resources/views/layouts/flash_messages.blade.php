               @if(Session::has('flash_message'))
                  <div class="alert <?php echo Session::get('flash_type')?>">
                      <h2>{{ Session::get('flash_message') }}</h2>
                  </div>
              @endif