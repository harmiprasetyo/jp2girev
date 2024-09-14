@extends('frontend.layout')

@section('content')

<script>
$(document).ready(function () {
    $("input[name='sector']").on('click',function(){
        v= $(this).val();
        if(v==6)
            $("#other_sector_div").show();
        else
            $("#other_sector_div").hide();
    });
});
</script>
<div class="container">
    <div class="main-content">
  <h1>{{ __('title.member-registration') }}</h1>
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

            <h3 class="mb-4">{{ __('title.member-form') }}</h3>
            <hr>
            <form action="{{URL("web/$ctrl/save")}}" method="POST" class="form-horizontal form-validate-jquery" id="transaction_form" enctype="multipart/form-data" >
                {{ csrf_field() }}
            
          
                <div class="controls">
          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('label.name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name','') }}" class="form-control" required >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label>{{ __('label.position') }} <span class="text-danger">*</span></label>
                                <input  name="position" value="{{ old('position','') }}" class="form-control" rows="3" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >{{ __('label.org-name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="org_name" value="{{ old('org_name','') }}" class="form-control" required >
                            </div>
                        </div>
                      
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >{{ __('label.sector') }} <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-1 text-right pr-0">a&nbsp;&nbsp;<input type="radio" name="sector" value="1"></div>
                                    <div class="col-md-11">Pemerintah</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-right pr-0">b&nbsp;&nbsp;<input type="radio" name="sector" value="2"></div>
                                    <div class="col-md-11">Swasta</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-right pr-0">c&nbsp;&nbsp;<input type="radio" name="sector" value="3"></div>
                                    <div class="col-md-11">Asosiasi</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-right pr-0">d&nbsp;&nbsp;<input type="radio" name="sector" value="4"></div>
                                    <div class="col-md-11">Akademisi</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 text-right pr-0">e&nbsp;&nbsp;<input type="radio" name="sector" value="5"></div>
                                    <div class="col-md-11">Individual/Expert</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-1 text-right pr-0">f&nbsp;&nbsp;<input type="radio" id="other_sector_rd" name="sector" value="6"></div>
                                    <div class="col-md-11">Lainnya</div>
                                </div>
                                <div class="row" id="other_sector_div" style="display: none">
                                    <div class="col-md-1 text-right pr-0"></div>
                                    <div class="col-md-11"><input type="text" name="other_sector" class="form-control" placeholder="Isi Industri/sektor institusi Anda" ></div>
                                </div>
                             
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label>{{ __('label.address') }} <span class="text-danger">*</span></label>
                                <textarea  name="address" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                     --}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label >{{ __('label.org-address') }} <span class="text-danger">*</span></label>
                                <textarea  name="org_address"  class="form-control" rows="3" required="required">{{ old('org_address','') }}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('label.cp-name') }} </label>
                                <input type="text" name="contact_person" class="form-control" placeholder="">
                            </div>
                        </div>
                      
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-error has-danger">
                                <label >{{ __('label.phone') }} <span class="text-danger">*</span></label>
                                <input type="input" name="phone" value="{{ old('phone','') }}" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-error has-danger">
                                <label >Email <span class="text-danger">*</span></label>
                                <input  type="email" name="email" value="{{ old('email','') }}" class="form-control" required >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label>{{ __('label.motivation') }} <span class="text-danger">*</span></label>
                                <textarea name="purpose" class="form-control" rows="4" required="required"></textarea>
                            </div>
                        </div> --}}
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
            <p> Jalan  Jatibaru Raya No. 22<br>
                RT. 15 RW. 01, Cideng, Jakarta</p>
            <p>{{ __('label.phone') }} :  +6221 3844306</p>
            <p>Email : <a href="mailto:sekretariat@jp2gi.org">sekretariat@jp2gi.org</a></p>        </div>
      </div>
        
    </div>

  </div>
  

</div>
  
</div>


@endsection