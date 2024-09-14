@extends('frontend.layout')

@section('content')

<div class="container">
  <div class="main-content">

    <h1>{{ $page_title }}</h1>
    <hr class="mb-5">

    <div class="row">
      <div class="col-md-6">
        
      </div>
    </div>
    @if($list!=NULL)
    @foreach($list as $row)
    @if($loop->iteration==1)
    <div class="card mb-4 shadow-sm">
     
        <div class="row">
          <div class="col-md-12">
            <a href="{{ URL('web/'.$ctrl.'/'.$row->id) }}">
                <img class="w-100 rounded mb-4 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.5&width=1200px&image='.asset('images/'.$ctrl.'/'.$row->image)) }}" alt="">
            </a>
          </div>
          <div class="col-md-12">
              <div class="card-body">
            <h3 class="card-title">{{ $row->title }}</h3>
            <small>Admin, {{ dateCustom($row->created_at,"d F Y") }}</small>
            <hr>
            <p class="card-text">{{ $row->content_short }}</p>
            <a href="{{ URL('web/'.$ctrl.'/'.$row->id) }}" class="">{{ __('button.view-more') }} →</a>
          </div>
        </div>
        </div>
    </div>

    @else
    <div class="card mb-4 border-0">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <a href="{{ URL('web/'.$ctrl.'/'.$row->id) }}">
                <img class="img-fluid rounded mb-4 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=400px&image='.asset('images/'.$ctrl.'/'.$row->image)) }}" alt="">
            </a>
          </div>
          <div class="col-md-8">
            <h3 class="card-title">{{ $row->title }}</h3>
            <small>Admin, {{ dateCustom($row->created_at,"d F Y") }}</small>
            <hr>
            <p class="card-text">{{ $row->content_short }}</p>
            <a href="{{ URL('web/'.$ctrl.'/'.$row->id) }}" class="">{{ __('button.view-more') }} →</a>
          </div>
        </div>
      </div>
    </div>
    <hr>
    @endif

    
    @endforeach
    @endif
  
  </div>
</div>


@endsection