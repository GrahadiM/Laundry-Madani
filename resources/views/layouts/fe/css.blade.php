    <!-- Favicon -->
    <link href="{{ \Setting::getSetting()->favicon == null ? asset('frontend/assets/images/favicon_default.ico') :  Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->favicon) }}" rel="icon">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="{{ asset('frontend') }}/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet" />
    <style>
        body {
          overflow: overlay;
        }
        ::-webkit-scrollbar {
          width: 10px;
          height: 10px;
        }
        ::-webkit-scrollbar-thumb {
          background: rgba(0, 0, 0, 0);
        }
        ::-webkit-scrollbar-track {
          background: rgba(0, 0, 0, 0);
        }
    </style>
