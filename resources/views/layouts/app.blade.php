<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}" >
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="ECH7ANDZ is a new Brand for the online sale of all types of digital codes and mainly Gaming codes. Appeared in august 2019, ECH7ANDZ operates in the Algerian market mainly,">
    <meta name="keywords" content="موقع شراء بطاقات جوجل بلاي,موقع لبيع بطاقات الشحن,اافضل موقع لبيع بطاقات الشحن,بطاقات قوقل بلاي,بطاقات جوجل بلاي,موقع بيع بطاقات ايتونز,شراء بطاقات ايتونز,شراء بطاقات جوجل بلاي,بطاقات جوجل بلاي مجانا,موقع شحن بطاقات قوقل بلاي,موقع بيع بطاقات بلس,موقع بيع بطاقات جوجل بلي,موقع بيع بطاقات ستور,موقع شراء بطاقات قوقل بلاي,موقع شراء بطاقات جوجل بلاي عن طريق باي بال,بطاقات الهدايا,ربح بطاقات جوجل بلاي,بطاقة جوجل بلاي,شراء بطاقات جوجل بلاي عن طريق باي بال">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>Ech7anDZ | Global Digital Online Game Store</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    {{-- End SEO --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">

    <!-- styles -->
    @if (LaravelLocalization::getCurrentLocale() == 'en')
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @else
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    @endif

        {{-- style.css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
     <link rel="stylesheet" href="{{ asset('css/footer.css')}}">


    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <style>
          ul
          {
            padding-right: 0px;
          }
          * {
            font-family: 'El Messiri', 'Tajawal', sans-serif;
          }
          body {
            background: #fff;
          }

        </style>
    @else
        <style>
           * {
            font-family: 12px/1.5 Roboto,Arial,sans-serif;
          }
          body {
            background: #fff;
          }
          .currency
              {
                right: 60px !important;
                left: auto
              }
          .currency ul
              {
                left: -120px !important;
              }
        </style>
    @endif

  @yield('style')

  <link rel=" icon" href="{{asset('shortcut.ico')}}" sizes="32x32"/>

  {{-- Dark Mode --}}
  @if ($settings['dark_mode'] == '1')
    <link rel="stylesheet" href="{{ asset('css/dark.css')}}">
  @endif
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-206965587-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-206965587-1');
    </script>
</head>
<body class="text-dark">

@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
    @include('layouts.nav')



  @include('layouts.messages')

      @yield('content')




        <!-- Footer -->

        @include('layouts.footer')

        <!-- End Footer -->




    <script src="https://kit.fontawesome.com/dc9e78ad18.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60835c1762662a09efc19957/1f40hvfd3';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
  <!--End of Tawk.to Script-->


    @yield('script')
</body>
</html>
