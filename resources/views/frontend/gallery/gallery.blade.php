@extends('frontend.layout')

@section('content')




<div class="container">
  <div class="main-content">

      <h1>{{ $page_title }}</h1>
      <hr class="mb-5">
      <div class="row text-center text-lg-left">

        @if($list!=NULL)
        @foreach($list as $row)
          <div class="col-md-4 col-6 mb-5">
            <div class="card h-100 text-center shadow">
            <a data-fancybox="images" data-caption="@if($row->location!='') {!! $row->location.", ".$row->date."&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;" !!} @endif{{ $row->title }}" href="{{ asset('images/gallery/'.$row->image) }}"><img class="img-fluid rounded mb-4 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=640px&image='.asset('images/gallery/'.$row->image)) }}" alt=""></a>
              <div class="card-body">
              @if($row->location!='')
              <p class="card-text mb-1">{!! $row->location.", ".$row->date !!}</p>
              @endif
              <p class="card-text">{!! $row->title !!}</p>
              </div>
            </div>
          </div>
        @endforeach
        @endif
          
      </div>

  </div>
</div>


@endsection