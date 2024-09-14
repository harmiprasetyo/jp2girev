@extends('frontend.layout')

@section('content')

<div class="container">
    <div class="main-content">
  <h1>{{ __('title.contact-us') }}</h1>
  <hr class="mb-5">
  <div class="row">

    <div class="col-md-8">

      <div class="card text-left">
        <div class="card-body">
            @if(@Session::get('status')=='success')
            <div class="alert bg-success text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {!! @Session::get('message') !!}
            </div>
            @endif
            
            @if(@Session::get('status')=='error')
            <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {!! @Session::get('message') !!}
            </div>
            @endif

            <h3 class="mb-4">{{ __('title.send-message-form') }}</h3>
            <hr>
            <form action="{{URL("web/$ctrl/save")}}" method="POST" class="form-horizontal form-validate-jquery" id="transaction_form" enctype="multipart/form-data" >
                {{ csrf_field() }}
    
          
                <div class="controls">
          
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('label.first-name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('label.last-name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" required >
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('label.regarding') }} <span class="text-danger">*</span></label>
                                  <select class="form-control" name="category" id="category" required>
                                    <option value="">{{ __('label.select') }}...</option>
                                    <option value="1">{{ __('label.collaboration') }}</option>
                                    <option value="2">{{ __('label.other-info') }}</option>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('label.subject') }} <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required >
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('label.message') }} <span class="text-danger">*</span></label>
                                <textarea name="content_short" class="form-control" rows="4" required="required"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary btn-wide" value="{{ __('button.submit') }}">
                        </div>
                    </div>
    
                </div>
          
            </form>
        </div>
      </div>

        

    </div>

    <div class="col-md-4">

      <div class="card text-left">
        <div class="card-body">
            <h3 class="mb-4">{{ __('title.contact-us') }}</h3>
            <hr>
            <p><b>Jejaring  Pasca Panen untuk Gizi Indonesia</b></p>
            <p>Jl.Balikpapan No.31 <br>
                Petojo Selatan Kec. Gambir <br>
                Jakarta Pusat 10160<br><br>
            {{  __('label.phone') }} : +6221 3844306
            <br>Email : <a href="mailto:sekretariat@jp2gi.org">sekretariat@jp2gi.org</a>
            <br>Website : <a href="http://www.jp2gi.org/">jp2gi.org</a></p>
            {{-- <p> Jalan  Jatibaru Raya No. 22<br>
                RT. 15 RW. 01, Cideng, Jakarta</p>
            <p> {{ __('label.phone') }} :  +6221 3844306</p>
            <p>Email : <a href="mailto:sekretariat@jp2gi.org">sekretariat@jp2gi.org</a></p> --}}
        </div>
      </div>
        
    </div>

  </div>
  

</div>
  
</div>


@endsection