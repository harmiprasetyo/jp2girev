@extends('frontend.layout')

@section('content')

<style>
  ul.social {
    margin-left: 2em;
  }
  ul.social {
    list-style: none;
    padding: 0 0.5em;
    margin: 0;
    margin-left: 0px;
  }
  ul.social li.title {
  vertical-align: -0.25em;
  }
  ul.social li {
  display: inline-block;
  }
  
  ul.social h4 {
  font-size: 0.938rem;
  font-weight: normal;
  margin: 0 0.5em 0 0;
  }
  
  ul.social a {
  display: block;
  padding: 0.25em;
  text-transform: uppercase;
  font-size: 0.8em;
  color:   #000;
  }
  
</style>

<div class="container p-0">
<header>
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">

       
        <div class="carousel-inner">
          @foreach($banner_list as $b)
          <div class="carousel-item @if($loop->iteration==1) active @endif" data-interval="10000">
            <img src="{{ asset('images/banner/'.$b->image) }}" class="d-block w-100" alt="...">
            <a href="@if($b->article!='' or $b->article!=NULL) {{ URL('web/article/'.$b->article) }} @else {{ "#" }} @endif">
                <div class="carousel-caption">
                  <h3 class="text-left">{{ $b->title }}</h3>
            </div></a>
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

   
</header>
</div>

<section class="home-section bg-white">
    <div class="container">

       
        <div class="row">
            <div class="col-md-12">
                <div id="accordion">
                    <div class="card">
                      <div class="card-header text-center" id="headingOne">
                        <h5 class="mb-0">
                          
                            {{ __('title.data-fact') }}
                          
                        </h5>
                      </div>
                  
                      <div>
                        <div class="card-body text-center">
                          <div class="row">
                          <div class="col-md-12 mb-4">
                                @php $content_full =  str_replace(array('<img','src="../../../../public/images'),array('<img class="img-fluid img-center"','src="'.asset('images')),$factdata_list[0]->content_full) @endphp
                                {!! $content_full !!}
                          </div>

                                <div class="col-md-12">
                                  {{-- <div class="card h-100"> --}}
                                      <h5 class="card-header mb-4">{{ __('title.activity-gallery') }}</h5>
                                      {{-- <div class="card-body"> --}}
                                          <div class="row">
                                            @if($gallery_list!=NULL)
                                            @foreach($gallery_list as $row)
                                              <div class="col-md-3  col-12 mb-4">
                                                  <div class="card card-small h-100 border-0">
                                                    <a data-fancybox="images" href="{{ asset('images/gallery/'.$row->image) }}"><img class="img-fluid rounded mb-2 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=400px&image='.asset('images/gallery/'.$row->image)) }}" alt=""></a>
                                                      <p class="card-text">{{ $row->title }}</p>
                                                  </div>
                                                </div>
                                              @endforeach    
                                              @endif                                      
                                          </div>
                                      {{-- </div> --}}
                                    {{-- </div>   --}}
                              </div>

                            </div>
                               
                              
                        </div>
                      </div>
                    </div>
                    
                  </div>
               
            </div>
          </div>
      
    </div>
  </section>

<section class="home-section bg-gray">
  <div class="container">
          
    <div class="row">
      
      <div class="col-md-4 mb-3 mb-md-0">
          <div class="card article-card">
              {{-- <h5 class="card-header">{{ __('title.newsletter') }}</h5> --}}
              <div class="card-body  card-small">
                  
                    <a href="{{ asset('docs/newsletter/'.$newsletter_list[0]->file)  }}"  target="_blank"> <img class="img-fluid rounded mb-4 mb-md-0" src="{{ asset('images/newsletter/'.$newsletter_list[0]->image) }}" alt=""></a>
                    {{-- <p class="card-text">{{ $newsletter_list[0]->title }}</p> --}}
              </div>
            </div>   

          
          
      </div>
      <div class="col-md-8">

          <div class="card article-card">
              <h5 class="card-header">{{ __('title.article') }}</h5>
              <div class="card-body">
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <a href="{{ URL('web/article/'.$article_list[0]->id) }}">
                        <img class="img-fluid rounded mb-4 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=600px&image='.asset('images/article/'.$article_list[0]->image)) }}" alt="">
                      </a>
                    </div>
                    <div class="col-md-6">
                      <h5 class="card-title mb-1">{{ $article_list[0]->title }}</h5>
                      {{-- <small>Admin, {{ dateCustom($article_list[0]->created_at,"d F Y") }}</small> --}}
                      <hr class="my-2">
                      <p class="card-text mb-2">{{ $article_list[0]->content_short }}
                      <p><a href="{{ URL('web/article/'.$article_list[0]->id) }}" class="text-info">{{ __('button.view-more') }} →</a></p>  
                      </div>
                  </div>

                  <div class="row">
                <div class="col-md-3 col-12">
                    <div class="card card-small h-100 border-0">
                      <a href="{{ URL('web/article/'.$article_list[1]->id) }}"><img class="img-fluid rounded mb-1 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=400px&image='.asset('images/article/'.$article_list[1]->image)) }}" alt=""></a>
                      <p class="card-text text-center mb-3 mb-md-0">{{ $article_list[1]->title }}</p>
                    </div>
                  </div>
                  <div class="col-md-3 col-12">
                      <div class="card card-small h-100 border-0">
                        <a href="{{ URL('web/article/'.$article_list[2]->id) }}"><img class="img-fluid rounded mb-1 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=400px&image='.asset('images/article/'.$article_list[2]->image)) }}" alt=""></a>
                      <p class="card-text text-center mb-3 mb-md-0">{{ $article_list[2]->title }}</p>
                      </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card card-small h-100 border-0">
                          <a href="{{ URL('web/article/'.$article_list[3]->id) }}"><img class="img-fluid rounded mb-1 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=400px&image='.asset('images/article/'.$article_list[3]->image)) }}" alt=""></a>
                      <p class="card-text text-center mb-3 mb-md-0">{{ $article_list[3]->title }}</p>
                        </div>
                      </div>
                      <div class="col-md-3 col-12">
                        <div class="card card-small h-100 border-0">
                          <a href="{{ URL('web/article/'.$article_list[4]->id) }}"><img class="img-fluid rounded mb-1 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=400px&image='.asset('images/article/'.$article_list[4]->image)) }}" alt=""></a>
                      <p class="card-text text-center mb-md-0">{{ $article_list[4]->title }}</p>
                        </div>
                      </div>                            
                </div>
                    
              </div>
            </div>  

            

      </div>

    </div>  
          
  </div>
      </section>

      <section class="home-section bg-white">
          <div class="container">

              <div class="row">
                  <style>
                  .image-parent{
                    width:100px;
                    padding-left:20px;
                  }
                  </style>
                  <div class="col-md-5 mb-3 mb-md-0">
                      <div class="card mb-4">
                          <h5 class="card-header">{{ __('title.from-member') }}</h5>
                          <div class="card-body">
                              <ul class="list-group list-group-flush">
                                @if($miscellaneous_list!=NULL)
                                @foreach($miscellaneous_list as $row)
                                  <li class="list-group-item">
                                    <div class="row">
                                      <div class="col-md-3 pt-1"><img src="{{ asset('images/miscellaneous/'.$row->image) }}" class="img-fluid"></div>
                                      <div class="col-md-9 pl-0"> <a href="{{ URL('web/miscellaneous/'.$row->id) }}">{{ $row->title }}</a>   </div>
                                    </div>                                  
                                </li>  
                                                
                                @endforeach           
                                @endif
                                </ul>
                          </div>
                          
                        </div>  

                        <div class="card">
                          <h5 class="card-header">{{ __('title.reference') }}</h5>
                          <div class="card-body">
                              <ul class="list-group list-group-flush">
                                @if($reference_list!=NULL)
                                @foreach($reference_list as $row)
                                  <li class="list-group-item">
                                    <div class="row">
                                      <div class="col-md-3 pt-1"><img src="{{ asset('images/report/'.$row->image) }}" class="img-fluid"></div>
                                      <div class="col-md-9 pl-0"> <a href="{{ asset('docs/report/'.$row->file)  }}" target="_blank">{{ $row->title }}</a>   </div>
                                    </div>                                  
                                </li>  
                                                
                                @endforeach           
                                @endif
                                </ul>
                          </div>
                          
                        </div>  
                  </div>

                  

      
                <div class="col-md-7">
                    <div class="card h-100">
                        <h5 class="card-header">{{ __('title.iplan') }}</h5>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                @if(@$iplan_list[0]!=NULL)
                                <div class="card h-100 border-0">
                                    <a @if($iplan_list[0]->url!='') href="{{ $iplan_list[0]->url }}" target="_blank" @else href="{{ URL('web/bic/'.$iplan_list[0]->id) }}" @endif><img class="img-fluid rounded" src="{{ asset('libs/imageresizer.php?cropratio=1:1&width=640px&image='.asset('images/bic/'.$iplan_list[0]->image)) }}" alt=""></a>    
                                  <div class="card-body h-100">
                                  <p class="card-text text-center" style="vertical-align:middle">{{ $iplan_list[0]->title }}</p>
                                  </div>                                      
                                </div>   
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                <div class="col-md-6">
                                  @if(@$iplan_list[1]!=NULL)
                                    <div class="card h-100 border-0">
                                      @if(@$iplan_list[1]->image!=NULL)
                                      <a @if($iplan_list[1]->url!='') href="{{ $iplan_list[1]->url }}" target="_blank" @else href="{{ URL('web/bic/'.$iplan_list[1]->id) }}" @endif><img class="img-fluid rounded" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=640px&image='.asset('images/bic/'.$iplan_list[1]->image)) }}" alt=""></a>  
                                      <p class="card-text text-center mt-2" style="vertical-align:middle">{{ $iplan_list[1]->title }}</p>  
                                      @endif
                                    </div>
                                    @endif
                                  </div>
                                
                                  <div class="col-md-6">
                                    @if(@$iplan_list[2]!=NULL)
                                      <div class="card h-100 border-0">
                                        @if(@$iplan_list[2]->image!=NULL)
                                        <a @if($iplan_list[2]->url!='') href="{{ $iplan_list[2]->url }}" target="_blank" @else href="{{ URL('web/bic/'.$iplan_list[2]->id) }}" @endif><img class="img-fluid rounded" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=640px&image='.asset('images/bic/'.$iplan_list[2]->image)) }}" alt=""></a>    <p class="card-text text-center" style="vertical-align:middle">{{ $iplan_list[2]->title }}</p>  
                                        @endif
                                      </div>
                                      @endif
                                    </div>
                                  </div>  
                            </div>
                          </div>
                          
                        </div>
                      </div>   
                    
                </div>
          
              </div>  
            
          </div>
        </section>



      


          <section class="home-section bg-gray">
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card h-100 text-center">
                  <h5 class="card-header">{{ __('title.multimedia') }}</h5>
                  <div class="card-body">

                      <div class="row">
                      @if($multimedia_list!=NULL)
                        @foreach($multimedia_list as $row)
                        @if($row->video_file!=NULL and $row->video_file!='') 
                        @php $url_video = asset('videos/multimedia/'.$row->video_file) @endphp
                        @else 
                        @php $url_video = "https://www.youtube.com/watch?v=".$row->video_url @endphp
                        @endif
                        <div class="col-md-3  col-12 mb-4">
                            <div class="card card-small h-100 border-0">
                              <div class="multimedia">
                                <a data-fancybox="videos" href="{{ $url_video  }}"><img class="img-fluid rounded mb-2 mb-md-0" src="{{ asset('libs/imageresizer.php?cropratio=1:.6&width=430px&image='.asset('images/multimedia/'.$row->image)) }}" alt="">
                                <button class="play-btn"><img src="{{ asset('img/play-button-2.png') }}" /></button>
                                </a>
                              </div>
                              <p class="card-text">{{ $row->title }}</p>
                            </div>
                          </div>
                        @endforeach
                      @endif
                      </div>
                    </div>
                  </div>   
                </div>
              </div>  
            </div>
          </section>

          <section class="home-section bg-white">
            <div class="container">
              
              <div class="row text-center mb-4">
                <div class="col-md-12 mb-4 mb-md-0">
                  <div class="card text-center">
                      <h5 class="card-header">{{ __('title.jp2gi-member') }}</h5>
                      <div class="card-body">
                        <div class="row d-flex justify-content-center mb-md-4">
                          <div class="col-md-1 offset-md-1 col-4 mb-3 mb-md-0 text-center">
                            <a href="http://ipb.ac.id"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo_IPB.png') }}" alt="Institut Pertanian Bogor"></a>
                          </div>
                          <div class="col-md-1  col-4 mb-3 mb-md-0  text-center">
                            <a href="http://arpionline.org"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo_Arpi.png') }}" alt="ARPI"></a>
                          </div>
                          <div class="col-md-2  col-6 mb-3 mb-md-0  text-center">
                            <a href="#"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo forikan.jpg') }}" alt="Forikan"></a>
                          </div>
                          <div class="col-md-2  col-6 mb-3 mb-md-0  text-center">
                            <a href="http://www.ap2hi.org"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo ap2hi.png') }}" alt="AP2HI"></a>
                          </div>
                          <div class="col-md-2  col-6 mb-3 mb-md-0  text-center">
                            <a href="http://ap5i-indonesia-seafood.com "  target="_blank"><img class="img-fluid w-75" src="{{ asset('img/member-logo/logo ap5i.jpg') }}" alt="AP5I"></a>
                          </div>
                 

                        </div>
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-1  col-4 mb-3 mb-md-0  text-center">
                          <a href="http://persagi.org"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo ahli gizi.png') }}" alt="PERSAGI"></a>
                        </div>
                        <div class="col-md-1   col-4 mb-3 mb-md-0  text-center">
                            <a href="http://www.gapmmi.id"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo gapmmi.jpg') }}" alt="GAPMMI"></a>
                        </div>
                        <div class="col-md-1  col-4 text-center">
                          <a href=""  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/logo apji.png') }}" alt=""></a>
                        </div>
                        <div class="col-md-1  col-4 text-center">
                          <a href="https://ultraindonesia.com"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/ultra.png') }}" alt="ULTRA Indonesia"></a>
                        </div>
                        <div class="col-md-1  col-4 text-center">
                          <a href="https://www.kristamedia.com"  target="_blank"><img class="img-fluid" src="{{ asset('img/member-logo/krista.png') }}" alt=""></a>
                        </div>
                      </div>

                      </div>
                  </div>
                </div>
              </div>

         

              <div class="row">
                <div class="col-md-7 mb-5">
                  <div class="card text-center mb-4  h-100">
                      <h5 class="card-header">{{ __('title.supported-by') }}</h5>
                      <div class="card-body">
                        <div class="row d-flex justify-content-center">
                          <div class="col-md-4 col-8 text-center">
                            <a href="https://www.gainhealth.org"  target="_blank"><img class="img-fluid" src="{{ asset('img/header-logo-lrg-alt.png') }}" alt=""></a>
                          </div>
                          <div class="col-md-4  col-8 text-center">
                            <a href="https://www.kemkes.go.id"  target="_blank"><img class="img-fluid" src="{{ asset('img/Logo_of_the_Ministry_of_Health_of_the_Republic_of_Indonesia.png') }}" alt=""></a>
                          </div>
                          <div class="col-md-4  col-8 text-center">
                            <a href="https://www.kkp.go.id"  target="_blank"><img class="img-fluid" src="{{ asset('img/material-logo.png') }}" alt=""></a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-5 mb-5">
                  <div class="card text-center mb-4 h-100">
                    <div class="card-body">
                      <div class="twitter social-container"  style="height: 90%">
                        <h5 class="mb-5">{{ __('title.follow-us') }}</h5>
                        <ul class="social">
                          <li><a href="https://twitter.com/jp2g_indonesia" target="_blank" title="Twitter"><img src="{{ asset('img/icon-twitter.svg') }}" alt="Twitter"></a></li>
                          <li><a href="https://www.facebook.com/Jejaring-Pasca-Panen-untuk-Gizi-Indonesia-109215860516635" target="_blank" title="Facebook"><img src="{{ asset('img/icon-facebook.svg') }}" alt="Facebook"></a></li>
                          <li><a href="https://www.instagram.com/jp2g_indonesia" target="_blank" title="Instagram"><img src="{{ asset('img/icon-instagram.svg') }}" alt="Instagram"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>                                  
                </div>
              </div>
              
            </div>
          </section>


@endsection