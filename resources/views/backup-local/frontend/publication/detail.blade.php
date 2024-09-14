@extends('frontend.layout')

@section('content')
<div class="container">
  <div class="main-content pt-0">

    {{-- <h1>{{ $page_title }}</h1>
    <hr class="mb-5">
     --}}
    <div class="row mb-2" >
    <div class="col-md-12">
        <img class="w-100 rounded mb-4 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.5&width=1200px&image='.asset('images/'.$ctrl.'/'.$detail->image)) }}" alt="">
      </div>
    </div>

    <div class="row" >
    <div class="col-md-12">
      
      <div class="row">
        {{-- <div class="col-md-6 text-left text-md-left pt-2">
          <span class="badge badge-info mb-3 mr-1">Article Category 1</span> <span class="badge badge-info mb-3">Article Category 2</span>
        </div> --}}
        <div class="col-md-6 text-left text-md-left mb-3 mb-md-0 col-share">
         <h5>Share on : </h5>
          <!-- Go to www.addthis.com/dashboard to customize your tools --> 
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d897dfab2eb12a2"></script> 

          <!-- Go to www.addthis.com/dashboard to customize your tools --> 
          <div class="addthis_inline_share_toolbox"></div> 
            
        </div>
      </div>
       
        <h2 class="mb-3">{{ $detail->title }}</h2>
        {{-- <div class="text-muted">Admin, {{ dateCustom($detail->created_at,"d F Y") }}</div> --}}
        <hr>
        @php $content_full =  str_replace(array('<img','src="../../../../public/images'),array('<img class="img-fluid img-center"','src="'.asset('images')),$detail->content_full) @endphp
          {!! $content_full !!}
        <hr>
        <div class="text-right"><a href="javascript:window.history.go(-1)">← Kembali</a></div>
    
    </div>
  </div>


</div>
</div>


@endsection