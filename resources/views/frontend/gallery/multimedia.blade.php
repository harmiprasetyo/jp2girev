@extends('frontend.layout')

@section('content')




<div class="container">
  <div class="main-content">

      <h1>{{ $page_title }}</h1>
      <hr class="mb-5">
      <div class="row text-center text-lg-left">

        @if($list!=NULL)
        @foreach($list as $row)
        <div class="col-md-4 col-12 mb-5">
            <div class="card h-100 text-center shadow-sm">
              <div class="multimedia">
                @if($row->video_file!=NULL and $row->video_file!='') 
                @php $url_video = asset('videos/multimedia/'.$row->video_file) @endphp
                @else 
                @php $url_video = "https://www.youtube.com/watch?v=".$row->video_url @endphp
                @endif
              <a data-fancybox="videos" href="{{ $url_video  }}"><img class="img-fluid" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=430px&image='.asset('images/multimedia/'.$row->image)) }}" alt="">
              <button class="play-btn"><img src="{{ asset('img/play-button-2.png') }}" /></button>
              </a>
              </div>
              <div class="card-body">
                <p class="card-text">{{ $row->title }}</p>
              </div>
            </div>
          </div>
          {{-- <div class="col-md-4 col-6 mb-5">
            <div class="card h-100 text-center shadow">
            <a data-fancybox="images" data-caption="{{ $row->title }}" href="{{ asset('images/gallery/'.$row->image) }}"><img class="img-fluid" src="{{ asset('images/gallery/'.$row->image) }}" alt=""></a>
              <div class="card-body">
              <p class="card-text">{{ $row->title }}</p>
              </div>
            </div>
          </div> --}}
        @endforeach
        @endif
          
      </div>

  </div>
</div>


@endsection