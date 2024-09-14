@extends('frontend.layout')

@section('content')

<div class="container">
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('{{ asset("img/nguyen-linh-wPJygs79jMA-unsplash.jpg") }}')">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h3 class="mb-0">Judul Slide 1</h3>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{ asset("img/zheng-hong-chua-wPWVIo8IoZk-unsplash.jpg") }}')">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h3 class="mb-0">Judul Slide 2</h3>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('{{ asset("img/zhimai-zhang-satNyOd77Jg-unsplash.jpg") }}')">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h3 class="mb-0">Judul Slide 3</h3>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
</div>


<section class="home-section bg-white">
  <div class="container">
          
    <div class="row">
      
      <div class="col-md-4">
          <div class="card mb-4">
              <h5 class="card-header">{{ __('Newsletter') }}</h5>
              <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Morbi consequat velit eu enim tincidunt iaculis.</a></li>
                  </ul>
              </div>
            </div>   

            <div class="card">
              <h5 class="card-header">{{ __('Riset') }}</h5>
              <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Morbi consequat velit eu enim tincidunt iaculis.</a></li>
                    <li class="list-group-item"><a href="#">Vivamus facilisis eros eu diam interdum, non auctor magna elementum.</a></li>
                    <li class="list-group-item"><a href="#">Duis sagittis tortor non ligula aliquet gravida.</a></li>
                    <li class="list-group-item"><a href="#">Maecenas sed enim vel sapien pharetra facilisis sed eleifend ipsum.</a></li>
                    
                  </ul>
              </div>
            </div>   

          
      </div>
      <div class="col-md-8">
          <div class="card h-100">
              <h5 class="card-header">{{ __('Article') }}</h5>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href="#">
                          <img class="img-fluid rounded mb-4 mb-md-0" src="https://source.unsplash.com/KJFLWEkrhPQ/600x360" alt="">
                         
                      </a>
                    </div>
                    <div class="col-md-6">
                      <h5 class="card-title mb-1">Judul Artikel 1</h5>
                      <small>October 1, 2019</small>
                      <hr class="my-2">
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.
                      <p><a href="#" class="text-info">Selengkapnya →</a></p>  
                      </div>
                  </div>
                  <hr>
                  <div class="row mb-4">
                      <div class="col-md-4 col-12">
                          <div class="card h-100 border-0">
                            <img class="card-img-top" src="https://source.unsplash.com/wPWVIo8IoZk/600x360" alt="">
                            
                            
                          </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card h-100 border-0">
                              <img class="card-img-top" src="https://source.unsplash.com/pWkk7iiCoDM/600x360" alt="">
                             
                              
                            </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="card h-100 border-0">
                                <img class="card-img-top" src="https://source.unsplash.com/M185_qYH8vg/600x360" alt="">
                               
                                
                              </div>
                            </div>
                            
                            
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-12">
                          <div class="card h-100 border-0">
                            <img class="card-img-top" src="https://source.unsplash.com/BvXUtQhTQzk/600x360" alt="">
                            
                            
                          </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card h-100 border-0">
                              <img class="card-img-top" src="https://source.unsplash.com/wPJygs79jMA/600x360" alt="">
                             
                              
                            </div>
                          </div>
                          <div class="col-md-4 col-12">
                              <div class="card h-100 border-0">
                                <img class="card-img-top" src="https://source.unsplash.com/sesveuG_rNo/600x360" alt="">
                               
                                
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
                
      
                  <div class="col-md-7">
                      <div class="card h-100">
                          <h5 class="card-header">{{ __('I-PLAN Innovation Challenge') }}</h5>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-7">
                                  <div class="card h-100 border-0">
                                      <a href="http://iplanchallenge2019.com" target="_blank"><img class="card-img-top" src="{{ asset('img/background2-new.jpg') }}" alt=""></a>    
                                    <div class="card-body h-100">
                                        <p class="card-text text-center" style="vertical-align:middle">I-PLAN Innovation Challenge 2019</p>
                                    </div>                                      
                                  </div>   
                                                           
                              </div>
                              <div class="col-md-5">
                                  <div class="row">
                                  <div class="col-12 mb-4">
                                      <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="https://source.unsplash.com/BvXUtQhTQzk/600x360" alt="">
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                        <div class="card h-100 shadow-sm">
                                          <img class="card-img-top" src="https://source.unsplash.com/wPWVIo8IoZk/600x360" alt="">
                                         
                                        </div>
                                      </div>
                                    </div>  
                              </div>
                            </div>
                            {{-- <div class="row mb-4">
                                <div class="col-md-4 col-12">
                                    <div class="card h-100 shadow-sm">
                                      <img class="card-img-top" src="https://source.unsplash.com/BvXUtQhTQzk/600x360" alt="">
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-12">
                                      <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="https://source.unsplash.com/wPWVIo8IoZk/600x360" alt="">
                                       
                                      </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                      <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="https://source.unsplash.com/vLQzopDRSNI/600x360" alt="">
                                        
                                      </div>
                                    </div>

                              </div>
                              <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="card h-100 shadow-sm">
                                      <img class="card-img-top" src="https://source.unsplash.com/D6XDhNfTk7E/600x360" alt="">
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-4 col-12">
                                      <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="https://source.unsplash.com/KJFLWEkrhPQ/600x360" alt="">
                                       
                                      </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                      <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="https://source.unsplash.com/sesveuG_rNo/600x360" alt="">
                                        
                                      </div>
                                    </div>

                              </div> --}}
                          </div>
                        </div>   
                      
                  </div>
                  <style>
                  .image-parent{
                    width:100px;
                    padding-left:20px;
                  }
                  </style>
                  <div class="col-md-5">
                      <div class="card h-100">
                          <h5 class="card-header">{{ __('Opini') }}</h5>
                          <div class="card-body">
                              <ul class="list-group list-group-flush">
                                  <li class="list-group-item d-flex justify-content-between">
                                      Morbi consequat velit eu enim tincidunt iaculis. 
                                      
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between">
                                      Vivamus facilisis eros eu diam interdum, non auctor magna elementum.
                                      
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between">
                                      Duis sagittis tortor non ligula aliquet gravida. 
                                     
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between">
                                      Maecenas sed enim vel sapien pharetra facilisis sed eleifend ipsum.
                                      
                                  </li>

                                  <li class="list-group-item d-flex justify-content-between">
                                      Vivamus facilisis eros eu diam interdum, non auctor magna elementum.
                                      
                                  </li>
                                 
                                </ul>
            
                          </div>
                        </div>  
                  </div>
            
                </div>  

  
            {{-- <div class="row">
              <div class="col-md-12">
                <div class="section-heading">
                  <h2>I-PLAN Innovation Challenge </h2>
                  <div class="heading-line"></div>
                </div>
              </div>
            </div>
            
            <div class="row">
                  <div class="col-md-6 col-lg-3 col-12  mb-4">
                          <div class="card h-100 shadow-sm">
                            <img class="card-img-top" src="{{ asset('img/placeholder.png') }}" alt="">
                            <div class="card-body">
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                              <p><a href="#">Selengkapnya →</a></p>
                            </div>
                            
                          </div>
                        </div>
  
                        <div class="col-md-6 col-lg-3 col-12  mb-4">
                              <div class="card h-100 shadow-sm">
                                <img class="card-img-top" src="{{ asset('img/placeholder.png') }}" alt="">
                                <div class="card-body">
                                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                  <p><a href="#">Selengkapnya →</a></p>
                                </div>
                                
                              </div>
                            </div>
  
                            <div class="col-md-6 col-lg-3 col-12  mb-4">
                                  <div class="card h-100 shadow-sm">
                                    <img class="card-img-top" src="{{ asset('img/placeholder.png') }}" alt="">
                                    <div class="card-body">
                                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                      <p><a href="#">Selengkapnya →</a></p>
                                    </div>
                                    
                                  </div>
                                </div>

                                <div class="col-md-6 col-lg-3 col-12 mb-4">
                                      <div class="card h-100 shadow-sm">
                                        <img class="card-img-top" src="{{ asset('img/placeholder.png') }}" alt="">
                                        <div class="card-body">
                                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                          <p><a href="#">Selengkapnya →</a></p>
                                        </div>
                                        
                                      </div>
                                    </div>
      
              </div>   --}}
            
          </div>
        </section>

<section class="home-section bg-white">
        <div class="container">

           
            <div class="row">
                <div class="col-md-12">
                    <div class="card h-100">
                        <h5 class="card-header text-center">{{ __('Fakta & Data') }}</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-xl-6 text-center mb-4">
                                    <a data-fancybox="fakta-data" href="{{ asset('img/fakta.jpg') }}"><img src="{{ asset('img/fakta.jpg') }}" class="img-fluid" /></a>
                                </div> 
                                
                                <div class="col-lg-12 col-xl-6 text-center">
                                    <a data-fancybox="fakta-data" href="{{ asset('img/fakta2.jpg') }}"><img src="{{ asset('img/fakta2.jpg') }}" class="img-fluid" /></a>
                                </div> 
                    
                            </div>  
                        </div>
                      </div>
                </div>
              </div>
          {{-- <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Fakta & Data</h2>
                <div class="heading-line"></div>
              </div>
            </div>
          </div> --}}
          
          
          
        </div>
      </section>

      


          <section class="home-section bg-gray">
                <div class="container">

                    <div class="row">
      
                        <div class="col-md-6">
                            <div class="card h-100">
                                <h5 class="card-header">{{ __('Multimedia') }}</h5>
                                <div class="card-body">

                                  <div class="row">
                                    <div class="col-md-6 col-12 mb-4">
                                        <div class="card h-100 text-center shadow-sm-sm">
                                          <div class="multimedia">
                                          <a data-fancybox="images-media" href="https://www.youtube.com/watch?v=1Uk8JBOcTgE"><img class="img-fluid" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                                          <button class="play-btn"><img src="{{ asset('img/play-button-2.png') }}" /></button>
                                          </a>
                                          </div>
                                          <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="col-md-6 col-12 mb-4">
                                        <div class="card h-100 text-center shadow-sm-sm">
                                            <div class="multimedia">
                                          <a data-fancybox="images" href="https://www.youtube.com/watch?v=1Uk8JBOcTgE"><img class="img-fluid" src="https://source.unsplash.com/wPJygs79jMA/400x300" alt="">
                                            <button class="play-btn"><img src="{{ asset('img/play-button-2.png') }}" /></button>
                                          </a>
                                        </div>
                                          <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6 col-12 mb-0">
                                        <div class="card h-100 text-center shadow-sm-sm">
                                            <div class="multimedia">
                                          <a data-fancybox="images" href="https://www.youtube.com/watch?v=1Uk8JBOcTgE"><img class="img-fluid" src="https://source.unsplash.com/KJFLWEkrhPQ/400x300" alt="">
                                            <button class="play-btn"><img src="{{ asset('img/play-button-2.png') }}" /></button>
                                          </a>
                                        </div>
                                          <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="col-md-6 col-12 mb-0">
                                        <div class="card h-100 text-center shadow-sm-sm">
                                            <div class="multimedia">
                                          <a data-fancybox="images" href="https://www.youtube.com/watch?v=1Uk8JBOcTgE"><img class="img-fluid" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
                                            <button class="play-btn"><img src="{{ asset('img/play-button-2.png') }}" /></button>
                                          </a>
                                        </div>
                                          <div class="card-body">
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>   
                            
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <h5 class="card-header">{{ __('Galeri Kegiatan') }}</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6  col-12 mb-4">
                                            <div class="card h-100 text-center shadow-sm">
                                              <a data-fancybox="images" href="https://source.unsplash.com/pWkk7iiCoDM/800x600"><img class="img-fluid" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt=""></a>
                                              <div class="card-body">
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                              </div>
                                            </div>
                                          </div>
                                  
                                          <div class="col-md-6 col-12 mb-4">
                                            <div class="card h-100 text-center shadow-sm">
                                              <a data-fancybox="images" href="https://source.unsplash.com/wPJygs79jMA/800x600"><img class="img-fluid" src="https://source.unsplash.com/wPJygs79jMA/400x300" alt=""></a>
                                              <div class="card-body">
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                              </div>
                                            </div>
                                          </div>
                                  
                                          
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-0">
                                            <div class="card h-100 text-center shadow-sm">
                                              <a data-fancybox="images" href="https://source.unsplash.com/EUfxH-pze7s/800x600"><img class="img-fluid" src="https://source.unsplash.com/KJFLWEkrhPQ/400x300" alt=""></a>
                                              <div class="card-body">
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                              </div>
                                            </div>
                                          </div>
                                  
                                          <div class="col-md-6 col-12 mb-0">
                                            <div class="card h-100 text-center shadow-sm">
                                              <a data-fancybox="images" href="https://source.unsplash.com/M185_qYH8vg/800x600"><img class="img-fluid" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt=""></a>
                                              <div class="card-body">
                                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
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


           

                  <section class="home-section bg-white">
                        <div class="container">
                
                          
                          <div class="row text-center">
        
                
                                <div class="col-md-6 mb-4 mb-md-0">
                                        <div class="card text-center">
                                            <h5 class="card-header">{{ __('Twitter') }}</h5>
                                            <div class="card-body">
                                                      

                                                                <a class="twitter-timeline" href="https://twitter.com/rumpisehat?ref_src=twsrc%5Etfw" data-chrome="nofooter noborders" data-width="100%"
                                                                data-height="600"> Tweets by @rumpisehat</a>
                                                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                                          
                                                    </div>
                                               </div>
                                </div>
                        
                                <div class="col-md-6 mb-5">

                                        <div class="card text-center mb-4">
                                            <h5 class="card-header">{{ __('Web Link') }}</h5>
                                                
                                            <div class="card-body">
                                                      <div class="row">
                                                          <div class="col-md-6 text-center mb-4">
                                                                <a href="https://www.gainhealth.org"  target="_blank"><img class="img-fluid" src="{{ asset('img/header-logo-lrg-alt.png') }}" alt=""></a>
                                                          </div>
                                                          <div class="col-md-6 text-center mb-4">
                                                                <a href="http://www.depkes.go.id"  target="_blank"><img class="img-fluid" src="{{ asset('img/Logo_of_the_Ministry_of_Health_of_the_Republic_of_Indonesia.png') }}" alt=""></a>
                                                          </div>
                                                          <div class="col-md-6 text-center">
                                                                <a href="https://www.kkp.go.id"  target="_blank"><img class="img-fluid" src="{{ asset('img/material-logo.png') }}" alt=""></a>
                                                          </div>
                                                          <div class="col-md-6 text-center">
                                                                <a href="http://arpionline.org" target="_blank"><img class="img-fluid" src="{{ asset('img/arpi-logo.png') }}" alt=""></a>
                                                          </div>
                                                      </div>
                                                    </div>
                                          </div>

                                  <div class="card text-center">
                                      <h5 class="card-header">{{ __('Kontak Kami') }}</h5>

                                      <div class="card-body text-left">
                                                    <p><b>Jejaring  Pasca Panen untuk Gizi Indonesia</b></p>
                                                    <p> Jalan  Jatibaru Raya No. 22, RT. 15 RW. 01
                                                      <br>Cideng, Jakarta</p>
                                                    <p> Telpon :  +6221 3844306</p>
                                                    <p>Email : <a href="mailto:sekretariat@jp2gi.org">sekretariat@jp2gi.org</a></p>
                                                 
                                              </div>
                                  </div>
                                </div>
                        
                               
                        
                                  
                              </div>
                          
                          
                        </div>
                      </section>

{{-- <div class="container">
        

<div class="main-content">
        <h1>Artikel Pilihan</h1>

        <hr>

        <h1>Fakta & Data</h1>

        <hr>

        <div class="section-heading">
            <h2>About us</h2>
            <div class="heading-line"></div>
            <p>We’ve been building unique digital products, platforms, and experiences for the past 6 years.</p>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/infografis_gemar_makan_ikankemenkes.jpeg') }}" style="height:600px" />
            </div> 
            
            <div class="col-md-6  text-center">
                <img src="{{ asset('img/2016_05_25-11_55_34_0dfd04bd515a0051e3ba45e7145f3a10.jpg') }}" style="height:600px" />
            </div> 

        </div>    
        <hr>

        <h1>I-PLAN Innovation Challenge </h1>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h1>Multimedia</h1>
            </div>
            <div class="col-md-6">
                <h1>Gallery</h1>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <h1>Web Link</h1>
            </div>
            <div class="col-md-4">
                <h1>Twitter</h1>
            </div>
            <div class="col-md-4">
                <h1>Kontak</h1>
            </div>
        </div>

        
</div>
</div> --}}

@endsection