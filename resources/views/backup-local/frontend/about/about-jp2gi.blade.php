@extends('frontend.layout')

@section('content')



<div class="container">
  <div class="main-content">

    <h1>{{ $detail->title }}</h1>
    <hr class="mb-5">
    <div class="row">
      {{-- <div class="col-lg-6">
        <img class="img-fluid rounded mb-4" src="{{ asset('img/placeholder.png') }}" alt="">
      </div> --}}
      <div class="col-lg-12 mb-4">
          @php $content_full =  str_replace(array('<img','src="../../../../public/images'),array('<img class="img-fluid img-center"','src="'.asset('images')),$detail->content_full) @endphp
          {!! $content_full !!}
      </div>

      {{-- <div class="col-lg-12 text-center">
        <img class="img-fluid rounded mb-4" src="{{ asset('img/sekilas.jpg') }}" alt="">
        <p><i>Gambar Penandatanganan Kerjasama Kemenkes dan KKP dalam Peluncuran JP2GI disaksikan oleh Duta Besar Belanda dan Country Manager GAIN Indonesia</i></p>
      </div> --}}
    </div>
  
  </div>
</div>


@endsection