<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
  @notifyCss

</head>

<body>
  <div class="container-scroller">
    @include('master.topbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('master.sidebar')
      <!-- partial -->
      <div class="main-panel">

        @yield('konten')
        @include('master.footer')
      </div>

      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{asset('js/dashboard.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- End custom js for this page -->
  @notifyJs

</body>

</html>