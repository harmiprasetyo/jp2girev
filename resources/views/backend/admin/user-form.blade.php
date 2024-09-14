@extends( 'backend.layout' )

@section( 'content' )

<div class="container-fluid">

  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <form action="{{URL("admin/save-profile")}}" method="POST" class="form-horizontal form-validate-jquery" id="transaction_form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ @$detail->{$pk} }}" />
        <div class="card-header"><h3>{{ $page_title }}</h3></div>
        <div class="card-body">

          
          
          <div class="form-group">
            <label class="">Nama <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="name" value="{{@$detail->name}}" required>
          </div>

          <div class="form-group">
            <label class="">Username <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="email" value="{{@$detail->email}}" required>
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
            <button type="submit" id="submit_bt" class="btn btn-primary btn-wide mr-2">Simpan</button>
            
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
    

@endsection
