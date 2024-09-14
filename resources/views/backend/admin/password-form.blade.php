@extends( 'backend.layout' )

@section( 'content' )


<script>
$(document).ready(function () {
  $('#confirm_password,#password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('');
    $('#message').hide();
    $('#submit_bt').removeAttr("disabled");
  } else 
    $('#message').show();
    $('#message').html('Not Matching').css('color', 'red');
});
});
</script>
<div class="container-fluid">

  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <form action="{{URL('admin/save-password')}}" method="POST" class="form-horizontal form-validate-jquery" id="transaction_form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ @$detail->{$pk} }}" />
        <div class="card-header"><h3>{{ $page_title }}</h3></div>
        <div class="card-body">

          
          
          <div class="form-group">
            <label class="">Password <span class="text-danger">*</span></label>
              <input class="form-control" type="password" name="password" id="password" value="" required>
          </div>

          <div class="form-group">
            <label class="">Konfirmasi Password <span class="text-danger">*</span></label>
              <input class="form-control" type="password" name="password" id="confirm_password" value="" required>
              <div class="pt-3" id="message"></div>
          </div>
         

          

          {{-- @if(isset($detail) ) 
          <div class="form-group" id="image_prev_div">
            <label class="">Foto @if(!isset($detail)) {!! '' !!} @endif </label>
              <div class="col-md-2 pl-0">
                  @if($detail->image=='')
                  <img src="{{ URL('public/images/no-image.png') }}" alt="" class="img-fluid" >   
                @else
                  <img class="img-fluid" src="{{URL('public/images/'.$ctrl.'/'.$detail->image)}}" />
                @endif
              </div>
          </div>
          @endif --}}

          {{-- <div class="form-group" id="image_div">
            <label class="">@if(isset($detail)) {{"Update "}} @endif Foto @if(!isset($detail)) {!! '' !!} @endif </label>
              <input type="file" name="image" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload Foto</button>
                </span>
              </div>
          </div>
           --}}

        </div>
        <div class="card-footer">
            <button type="submit" id="submit_bt" class="btn btn-primary btn-wide mr-2" disabled>Simpan</button>
            
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
    

@endsection
