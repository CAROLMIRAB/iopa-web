<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>IOPA ADMIN</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->

  <link href="{{ asset('back/css/build.back.min.css') }}" rel="stylesheet">
  <link href="{{ asset('back/css/custom.back.min.css') }}" rel="stylesheet">

</head>

<body>
  <!-- Sidenav -->
  @include("back.layouts.sidebar")
  <!-- Main content -->
  <div class="main-content">  
    <!-- Header -->
  @include('back.layouts.header')
    <!-- Page content -->
    <div class="container-fluid mt--7">

      @yield('content')
  @include('back.layouts.footer')
    </div>

  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>-->
  <script src="{{ asset('back/js/build.back.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('back/js/custom.back.min.js') }}"></script>
  
  <script>
    Core.dropdown();
  </script>
  @yield('scripts')
</body>

</html>