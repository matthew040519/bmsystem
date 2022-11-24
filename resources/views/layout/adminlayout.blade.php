<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}} ">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}} ">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}} ">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/img/favicon.ico')}} " />
</head> 

<body>
  <div class="loader"></div>
  @yield('content')
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js')}} "></script>
  <!-- JS Libraies -->
  <script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js')}} "></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/index.js')}} "></script>
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}} "></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js')}} "></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>