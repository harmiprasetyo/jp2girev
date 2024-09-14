<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin {{ ENV('APP_NAME') }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="{{ asset('img/j-icon.png') }}" type="image/x-icon">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/icon-kit/dist/css/iconkit.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/ionicons/dist/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('backend/css/theme.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <script src="{{ asset('backend/vendor/modernizr-2.8.3.min.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <script src="https://cdn.tiny.cloud/1/ep69md7kfcnua9tf2rx4yrzgwjfna5u4oovep473gxid8891/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script type="text/javascript">
  // tinymce.init({
  //   selector: '.content_full',
  //   width: '100%',
  //   height: 500,
  //   plugins: [
  //     'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
  //     'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
  //     'save table directionality emoticons template paste'
  //   ],
  //   toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | image | preview '
  // });

  tinymce.init({
    selector: '.content_full',
    width: '100%',
    height: 500,
    menubar: false,
    images_upload_url: '{{ URL("upload.php?module=$ctrl") }}',
    //automatic_uploads: false,
    // override default upload handler to simulate successful upload
    images_upload_handler: function (blobInfo, success, failure) {
      var xhr, formData;

      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', '{{ URL("upload.php?module=$ctrl") }}');

      xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }

        success(json.location);
      };

      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
    },
    plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table paste imagetools wordcount"
    ],
    // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link @if($ctrl=='achievement-emo-demo' || $ctrl=='article') {{ 'image' }} @endif | code preview",

    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code preview",

  });
  
  </script>

</head>

<body>
  <div class="wrapper">
    <header class="header-top" header-theme="light">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
           
          <div class="top-menu d-flex align-items-center">
              <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
              <div class="pl-10 font-weight-bold">{{ Auth::user()->name }} - {{ date("d F Y") }}</div>
          </div>
          <div class="top-menu d-flex align-items-center">
            <div class="dropdown">
              <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('backend/img/avatar/1493022872_avatar.jpg') }}"></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ URL('admin/edit-profile') }}"><i class="ik ik-user dropdown-icon"></i>Edit Profile</a>
                <a class="dropdown-item" href="{{ URL('admin/edit-password') }}"><i class="ik ik-lock dropdown-icon"></i>Edit Password</a>
                <a class="dropdown-item" href="{{ URL('admin/logout') }}" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="ik ik-power dropdown-icon"></i>Logout
                </a>
                <form id="logout-form" action="{{ URL('admin/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="page-wrap">
      <div class="app-sidebar colored">
        <div class="sidebar-header" style="background-color: #fff">
          <img src="{{ asset('img/logo-jp2gi.png') }}" class="header-brand-img w-50" alt="">
        </div>

        <div class="sidebar-content">
          <div class="nav-container pt-20">
            <nav id="main-menu-navigation" class="navigation-main">

                {{-- <div class="nav-item @if('home'==$menu) active @endif">
                  <a href="{{ URL('admin/home') }}"><i class="ik ik-home"></i><span>Home</span></a>
                </div> --}}
                @php $menu_list = getMenu('0'); @endphp
                @foreach($menu_list as $m)
                  @if($m->has_child==0)
                  
                  @if($m->alias!='home')
                    <div class="nav-item @if($m->alias==$menu) active @endif">
                      <a href="{{ URL('admin/post/'.$m->mod_name) }}"><i class="ik {{ $m->icon }}"></i><span>{{ $m->name }}</span></a>
                    </div>
                    @endif
                    {{-- <li class="nav-item @if($m->alias==$menu) active @endif"><a class="nav-link" href="{{ URL('web/'.$m->mod_name) }}">{{ $m->name }}</a></li> --}}
                  @else
                    @php $sub_menu = getMenu($m->id) @endphp 
                    <div class="nav-item has-sub @if($m->alias==$menu) active open @endif">
                        <a href="javascript:void(0)"><i class="ik {{ $m->icon }}"></i><span>{{ $m->name }}</span></a>
                        <div class="submenu-content">
                            @foreach($sub_menu as $sm)
                            <a href="{{ URL('admin/post/'.$sm->mod_name) }}" class="menu-item @if($sm->alias==$ctrl) active @endif">{{ $sm->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    {{-- <li class="nav-item dropdown @if($m->alias==$menu) active @endif">
                      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $m->name }}
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                          @foreach($sub_menu as $sm)
                            <a class="dropdown-item" href="{{ URL('web/'.$sm->mod_name) }}">{{ $sm->name }}</a>
                          @endforeach
                      </div>
                    </li> --}}
                    
                  @endif
                @endforeach

            </nav>
          </div>
        </div>
      </div>

      <div class="main-content">
          @yield('content')
      </div>

      <footer class="footer">
        <div class="w-100 clearfix">
          <span class="text-center text-sm-left d-md-inline-block">COPYRIGHT © 2019 {{ ENV('APP_NAME') }}.</span>
        </div>
      </footer>

    </div>
  </div>

  
  
  <script src="{{ asset('backend/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/screenfull/dist/screenfull.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/moment/moment.js') }}"></script>
  <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/d3/dist/d3.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/c3/c3.min.js') }}"></script>
  <script src="{{ asset('backend/js/plugins/tables.js') }}"></script>
  <script src="{{ asset('backend/js/plugins/widgets.js') }}"></script>
  <script src="{{ asset('backend/js/plugins/charts.js') }}"></script>
  <script src="{{ asset('backend/js/theme.js') }}"></script>
    
</body>

</html>
