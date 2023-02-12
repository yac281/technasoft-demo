<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Technasoft Demo')</title>
    <script src="https://kit.fontawesome.com/e0e7b087a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.brootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    @stack('css')
    <!-- /Custom CSS -->
  </head>

  <body>
    <!--Header-->
    <div class="it-header-center-wrapper it-small-header p-0 fixed-top z-99">
      <div class="container-fluid px-3">
        <div class="row">
          <div class="col-12">
            <div class="it-header-center-content-wrapper px-0">
              <div class="it-brand-wrapper it-brand-apps">

              </div>
              <div class="it-right-zone">
                @include('partials.userbar')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/Header-->
    <!--Content-->
    <div id="main-content" class="d-flex">
      @yield('content')
    </div>
    <!--/Content-->
    @stack('script')
  </body>
</html>
