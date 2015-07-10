@if(Session::has('flash_message'))
  <div class="alert <?php echo Session::get('flash_type')?>">
      <p>{{ Session::get('flash_message') }}</p>
  </div>
@endif