@extends('frontend.layout')

@section('content')




<div class="container">
  <div class="main-content">

      <h1>{{ $page_title }}</h1>
      <hr class="mb-5">
      <div class="row text-center text-lg-left">

        @foreach($list as $row)
          <div class="col-md-4 col-6 mb-5">
            <div class="card h-100 text-center shadow">
            <a data-fancybox="images" data-caption="{{ $row->title }}" href="{{ asset('images/gallery/'.$row->image) }}"><img class="img-fluid" src="{{ asset('images/gallery/'.$row->image) }}" alt=""></a>
              <div class="card-body">
              <p class="card-text">{{ $row->title }}</p>
              </div>
            </div>
          </div>

        @endforeach
          
      </div>

  </div>
</div>


@endsection