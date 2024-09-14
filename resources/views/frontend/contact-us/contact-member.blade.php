@extends('frontend.layout')

@section('content')

<div class="container">
    <div class="main-content">
  <h1>Kontak Kami</h1>
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

            <h3 class="mb-4">Form Pendaftaran Anggota JP2GI</h3>
            <hr>
            <form action="{{URL("web/$ctrl/save")}}" method="POST" class="form-horizontal form-validate-jquery" id="transaction_form" enctype="multipart/form-data" >
                {{ csrf_field() }}
            
          
                <div class="controls">
          
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Depan <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Belakang <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" required >
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label>Alamat <span class="text-danger">*</span></label>
                                <textarea  name="address" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Nama Organisasi/Kelompok <span class="text-danger">*</span></label>
                                <input type="text" name="org_name" class="form-control" required >
                            </div>
                        </div>
                      
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label >Alamat Organisasi/Kelompok <span class="text-danger">*</span></label>
                                <textarea  name="org_address" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Kontak / Perseorangan </label>
                                <input type="text" name="contact_person" class="form-control" placeholder="Nama Kontak dalam Organisasi diisi apabila akan menjadi kontak person bagi Forum JP2GI">
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-error has-danger">
                                <label >No HP <span class="text-danger">*</span></label>
                                <input type="input" name="phone" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-error has-danger">
                                <label >Email <span class="text-danger">*</span></label>
                                <input  type="email" name="email" class="form-control" required >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-error has-danger">
                                <label>Tujuan / Motivasi menjadi Anggota <span class="text-danger">*</span></label>
                                <textarea name="purpose" class="form-control" rows="4" required="required"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary btn-wide" value="Submit">
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
            <h3 class="mb-4">Data Kontak</h3>
            <hr>
            <p><b>Jejaring  Pasca Panen untuk Gizi Indonesia</b></p>
            <p> Jalan  Jatibaru Raya No. 22<br>
                RT. 15 RW. 01, Cideng, Jakarta</p>
            <p> Telpon :  +6221 3844306</p>
            <p>Email : <a href="mailto:sekretariat@jp2gi.org">sekretariat@jp2gi.org</a></p>        </div>
      </div>
        
    </div>

  </div>
  

</div>
  
</div>


@endsection