@extends('frontend.layout')

@section('content')

<div class="container">
  <div class="container">
    <div class="main-content">
      <h1>{{ $page_title }}</h1>
      <hr class="mb-5">

      @foreach($tahun_list as $row_tahun)
      @php $month_list = $newsletter_model->getMonthList($row_tahun->year);@endphp
      <h2 class="font-weight-bold text-info mb-4 mt-5">{{ $row_tahun->year }}</h2>

      @foreach($month_list as $row_month)
      @php $list = $newsletter_model->getList('','',$row_tahun->year,$row_month->month);@endphp
      <h5 class="font-weight-bold">‒&nbsp;&nbsp;{{ date('F', mktime(0, 0, 0, $row_month->month, 10)) }}</h5>
      <table class="table">
        
          <tbody>
              @foreach($list as $row)
            <tr>
              <td width="50px"><img class="mb-4 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=3:4&width=50px&image='.asset('images/'.$ctrl.'/'.$row->image)) }}" alt=""></td>
              <td width="" style="vertical-align: middle"><a href="{{ asset('docs/newsletter/'.$row->file)  }}" target="_blank">{{ $row->title }}</a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      @endforeach
      @endforeach
      

    </div>  
  </div>
</div>


@endsection