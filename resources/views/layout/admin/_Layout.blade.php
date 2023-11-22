
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin-Nội Thất</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-ic') }}on.png" rel="logo">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


  <!-- jQuery and jQuery UI (REQUIRED) -->
  <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="{{ asset('admin/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/lib/snote/summernote-bs4.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/lib/jqueryui/themes/themes/base/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/lib/jqueryui/themes/themes/base/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/lib/elfinder/css/elfinder.full.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/lib/elfinder/css/theme.css') }}" />
    <script src="{{ asset('admin/lib/snote/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/lib/snote/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/lib/snote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin/lib/jqueryui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/lib/elfinder/js/elfinder.min.js') }}"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/admin/index" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">Admin-Nội Thất</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block">
          <a class="nav-link nav-icon search-bar-toggle " href="/">
            Trang chủ
          </a>
        </li><!-- End Search Icon-->



      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <x-AdminMenuComponent/>

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Admin-Nội Thất</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>

    function openDialog() {
        var fm = $('<div/>').dialogelfinder({
            // baseUrl: "@Url.Content("~/admin/lib/elFinder/")",
  		    url : '{{ route('elfinder.connector') }}',
  		    lang : 'vi',
  		    width : 940,
  		    height: 550,
  		    destroyOnClose : true,
            closeOnEditorCallback: true,
            getFileCallback: function (files) {
                document.getElementById('file_input').value = files.url;
            },
  		    commandsOptions : {
  			    getfile : {
  			        oncomplete : 'close',
  			        folders : false
  			    }
  		    },
            uiOptions: {
                toolbar: [
                    ['home', 'back', 'forward', 'up', 'reload'],
                    ['mkdir', 'mkfile', 'upload'],
                    ['open', 'download', 'getfile'],
                    ['undo', 'redo'],
                    ['copy', 'cut', 'paste', 'delete'],
                    ['duplicate', 'rename', 'edit', 'resize', 'chmod'],
                    ['selectall', 'selectnone', 'selectinvert'],
                    ['quicklook', 'info'],
                    ['extract', 'archive'],
                    ['search'],
                    ['view', 'sort'],
                    ['fullscreen']
                ]
            },
            contextmenu: {
                navbar: ['open', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'info'],
                cwd: ['reload', 'back', '|', 'upload', 'mkdir', 'mkfile', 'paste', '|', 'info'],
                files: [
                    'getfile', '|', 'open', 'quicklook', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
                    'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info'
                ]
            },
            inlyMimes: ["image"],
  	    }).dialogelfinder('instance');
    }

  </script>

</body>

</html>
