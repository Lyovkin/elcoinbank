<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>ElcoinBank - @yield('title')</title>

    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="/css/custom.css" rel="stylesheet">

    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 0px;
        }
    </style>
    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<body id="page-top" class="index">

 @include('partials.navigation')
<!-- Header -->
<header>
    @yield('header')
</header>

@yield('content')
 <div data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff" data-share-counter-size="12" data-top-button="false" data-share-counter-type="disable" data-share-style="1" data-mode="share" data-like-text-enable="false" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="fixed-left" data-text-color="#000000" data-share-shape="round" data-sn-ids="fb.vk.tw.ok.gp.mr." data-share-size="30" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.vb." data-pid="1543996" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons" ></div>

 @include('partials.footer')
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>
 <script type="text/javascript">(function(w,doc) {
         if (!w.__utlWdgt ) {
             w.__utlWdgt = true;
             var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
             s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
             s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
             var h=d[g]('body')[0];
             h.appendChild(s);
         }})(window,document);
 </script>
@yield('js')

</body>
</html>
