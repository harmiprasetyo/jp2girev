<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170245068-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-170245068-1');
    </script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description"
        content="Jejaring Pasca Panen untuk Gizi Indonesia (JP2GI) merupakan wadah untuk menghimpun, berkomunikasi dan bekerjasama antara para pakar, instansi pemerintah, lembaga keuangan, perusahaan swasta, pelaku di sepanjang rantai pasok, serta masyarakat yang bergerak di bidang pasca panen dan gizi">
    <meta name="keywords" content="Jejaring Pasca Panen untuk Gizi Indonesia, JP2GI">
    <meta name="author" content="Admin">


    <meta property="og:title" content="{{ ENV('APP_NAME') }}" />
    <meta property="og:url" content="{{ URL('home') }}" />
    <meta property="og:description"
        content="Jejaring Pasca Panen untuk Gizi Indonesia (JP2GI) merupakan wadah untuk menghimpun, berkomunikasi dan bekerjasama antara para pakar, instansi pemerintah, lembaga keuangan, perusahaan swasta, pelaku di sepanjang rantai pasok, serta masyarakat yang bergerak di bidang pasca panen dan gizi" />
    <meta property="og:image" content="{{ asset('img/logoemodemo.png') }}" />
    <meta property="og:image:width" content=1200 />
    <meta property="og:type" content="website" />

    <link rel="shortcut icon" href="{{ asset('img/j-icon.png') }}" type="image/x-icon">

    <title>{{ ENV('APP_NAME') }} - {{ $page_title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700,900&display=swap" rel="stylesheet">  --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&display=swap" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700&display=swap" rel="stylesheet">  --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Alegreya:400,700,900&display=swap" rel="stylesheet">  --}}

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    {{-- <script>
  $(window).on("scroll", function() {
    if($(window).scrollTop()) {
      $('nav').addClass('black');
    }
    else {
      $('nav').removeClass('black');
    }
  })
  </script> --}}

</head>

<body @if ($ctrl == 'home' or isset($detail)) class="home" @endif>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            {{-- <a class="navbar-brand" href="{{ URL('home') }}"><h3 class="mb-0 text-info">Forum JP2GI</h3></a> --}}
            <a class="navbar-brand" href="{{ URL('home') }}"><img src="{{ asset('img/logo-jp2gi.png') }}"
                    alt="" class="img-fluid"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @if ($ctrl == 'home') active @endif"><a class="nav-link"
                            href="{{ URL('web/home') }}">{{ __('title.home') }}</a></li>
                    @php

                        function getMenu($parent, $frontend_status = 1)
                        {
                            $model = new App\Menu();
                            $list = $model->getList($parent, $frontend_status);

                            return $list;
                        }
                        $menu_list = getMenu('0');
                    @endphp
                    @foreach ($menu_list as $m)
                        @if ($m->has_child == 0)
                            <li class="nav-item @if ($m->alias == $menu) active @endif"><a class="nav-link"
                                    href="{{ URL('web/' . $m->mod_name) }}">{{ $m->name }}</a></li>
                        @else
                            @if ($m->alias != 'home')
                                @php
                                    $sub_menu = getMenu($m->id);
                                @endphp
                                <li class="nav-item dropdown @if ($m->alias == $menu) active @endif">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ $m->name }}
                                    </a>

                                    <div class="dropdown-menu">
                                        @foreach ($sub_menu as $sm)
                                            <a class="dropdown-item"
                                                href="{{ URL('web/' . $sm->mod_name) }}">{{ $sm->name }}</a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endif
                    @endforeach

                    {{-- <li class="nav-item"><a class="nav-link" href="{{ URL('web/home') }}">Beranda</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tentang Kami
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ URL('web/about/jp2gi') }}">Sekilas JP2GI</a>
                <a class="dropdown-item" href="{{ URL('web/about/management') }}">Kepengurusan dan managemen</a>
                <a class="dropdown-item" href="{{ URL('web/about/member') }}">Anggota jejaring</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Publikasi
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ URL('web/publication/article') }}">Artikel</a>
                <a class="dropdown-item" href="{{ URL('web/publication/newsletter') }}">Newsletter</a>
                <a class="dropdown-item" href="{{ URL('web/publication/research') }}">Riset</a>
                <a class="dropdown-item" href="{{ URL('web/publication/opini') }}">Opini</a>
                <a class="dropdown-item" href="{{ URL('web/publication/report') }}">Laporan</a>
                <a class="dropdown-item" href="{{ URL('web/publication/others') }}">Serba-Serbi</a>
            </div>
          </li>

          <li class="nav-item"><a class="nav-link" href="{{ URL('web/gallery') }}">Galeri Kegiatan</a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Publikasi
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ URL('web/contact/member-reg') }}">Menjadi anggota JP2GI</a>
                <a class="dropdown-item" href="{{ URL('web/contact/') }}">Bekerjasama dengan JP2GI</a>
                <a class="dropdown-item" href="{{ URL('web/contact/nore-info') }}">Informasi lainnya</a>
            </div>
          </li> --}}

                    <li class="nav-item dropdown ml-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (app()->getLocale() == 'id')
                                <img width="24px;" src="{{ asset('img/indonesia4.png') }}" />&nbsp;&nbsp;INA
                            @else
                                <img width="24px;" src="{{ asset('img/united-kingdom.png') }}" />&nbsp;&nbsp;EN
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('locale/id') }}"><img width="24px;"
                                    src="{{ asset('img/indonesia4.png') }}" />&nbsp;&nbsp;INA</a>
                            <a class="dropdown-item" href="{{ url('locale/en') }}"><img width="24px;"
                                    src="{{ asset('img/united-kingdom.png') }}" />&nbsp;&nbsp;EN</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Content -->
    <div id="content">
        @if ($ctrl != 'home' and !isset($detail))
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL('home') }}">{{ __('menu.home') }}</a></li>
                        @if (@$parent_menu != '')
                            <li class="breadcrumb-item">{{ @$parent_menu }}</li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{ @$title }}</li>
                    </ol>
                </div>
            </nav>
        @endif
        @yield('content')
    </div>
    <!-- /Content -->

    <!-- Footer -->
    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; 2019 JP2GI
                <br>This website is supported by funding from GAIN, the Global Alliance for Improved Nutrition.
            </p>
        </div>
        <!-- /.container -->
    </footer>


</body>

</html>
