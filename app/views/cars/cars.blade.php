<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inside Car Connection</title>
    <!-- Basic favicons -->
  <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <!--[if IE]><link rel="shortcut icon" href="/favicon.ico"><![endif]-->
  <!-- For Opera Speed Dial -->
  <link rel="icon" type="image/png" sizes="195x195" href="/favicon-195.png">
  <!-- For iPad with high-resolution Retina Display running iOS ≥ 7 -->
  <link rel="apple-touch-icon" sizes="152x152" href="/favicon-152.png">
  <!-- For iPad with high-resolution Retina Display running iOS ≤ 6 -->
  <link rel="apple-touch-icon" sizes="144x144" href="/favicon-144.png">
  <!-- For iPhone with high-resolution Retina Display running iOS ≥ 7 -->
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon-120.png">
  <!-- For iPhone with high-resolution Retina Display running iOS ≤ 6 -->
  <link rel="apple-touch-icon" sizes="114x114" href="/favicon-114.png">
  <!-- For Google TV devices -->
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96.png">
  <!-- For iPad Mini -->
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon-76.png">
  <!-- For first- and second-generation iPad -->
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon-72.png">
  <!-- For non-Retina iPhone, iPod Touch and Android 2.1+ devices -->
  <link rel="apple-touch-icon" href="favicon-57.png">
  <!-- Windows 8 Tiles -->
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="/favicon-144.png">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/app.css" />
    <script src="/bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>
  <header id="header">
    <div class="row">
      <div id="logo">
        <img src="/img/inside-car-connection.svg" alt="Inside Car Connection" />
      </div>
    </div>
  </header>
  <div class="row">
    <div class="large-12 columns">
      <!-- will be used to show any messages -->
      @if (Session::has('message'))
          <div data-alert class="alert-box success radius">
            {{ Session::get('message') }}
            <a href="#" class="close">&times;</a>
          </div>
        @endif
    </div>
  </div>

<div class="row">

  <div class="large-3 columns">
    <div id="why-iccX">
      <div class="row">
        <div class="large-12 columns">
          <h1 class="section-title adminpage">Admin</h1>
          <p>
            <a href="/cars" title="View listings">View Listings</a><br />
            <a href="/cars/create" title="Add listing">Add Listing</a><br />
            <a href="/">Main Page</a><br />
            <a href="{{ URL::to('logout') }}">Logout</a><br />
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="large-9 columns">

    
          @yield('content')

    </div>
  </div>

</div>
  <footer id="footer">
    <div class="row">
      <div class="large-12 columns">
      </div>
    </div>
  </footer>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/foundation/js/foundation.min.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>