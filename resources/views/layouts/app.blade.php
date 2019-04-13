<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_token" content="{{ csrf_token() }}">
<title> {{ config('sximo.cnf_appname')}} </title>

<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

<link href="{{ asset('sximo5/sximo.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/iCheck/skins/square/green.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/toast/css/jquery.toast.css')}}" rel="stylesheet">
<!-- Icon CSS -->   
<link href="{{ asset('sximo5/fonts/icomoon.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<!--<link href="{{ asset('sximo5/css/colors.css')}}" rel="stylesheet"> -->

<!-- Sximo 5 Main CSS -->
<link href="{{ asset('sximo5/css/style.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/css/all-themes.css')}}" rel="stylesheet">
<!--<link href="{{ asset('sximo5/css/sximo.css')}}" rel="stylesheet"> -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript" src="{{ asset('sximo5/sximo.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('sximo5/js/sximo.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo5/js/plugins/node-waves/waves.js') }}"></script>

<script type="text/javascript" src="{{ asset('sximo5/js/admin.js') }}"></script>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->         

<style>
    .amenityFilter + * .select2-selection__rendered{
      border: 1px solid #dddddd !important;
    }
</style>
</head>

<body class="theme-deep-purple theme-pink open-sidebar pace-done close-sidemenu">
<div id="wrapper">

      <aside id="leftsidebar" class="sidebar">
         @include('layouts.sidebar')             
      </aside>

      <aside id="rightsidebar" class="right-sidebar hide">
         @include('layouts.rightbar')            
        </aside>

        <section class="content">
           @include('layouts.header') 
          <div class="m-container m-container--responsive m-container--xxl">
            <div class="ajaxLoading"></div>
            @yield('content') 
          </div>  
        </section>

<div class="modal fade" id="sximo-modal" tabindex="-1" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-default">
      <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body" id="sximo-modal-content">
    </div>
  </div>
</div>
</div>
     <!-- begin::Footer -->
      <footer class="m-grid__item m-footer ">
        <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
          <div class="m-footer__wrapper">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
              <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                   2019 &copy; Copyright <a href="http://13.92.240.159/demo/public/" class="m-link">Sports Travel HQ</a>
                </span>
              </div>
              <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
       <!--          <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                  <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                      <span class="m-nav__link-text">About</span>
                    </a>
                  </li>
                  <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                      <span class="m-nav__link-text">Privacy</span>
                    </a>
                  </li>
                  <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                      <span class="m-nav__link-text">T&C</span>
                    </a>
                  </li>
                  <li class="m-nav__item">
                    <a href="#" class="m-nav__link">
                      <span class="m-nav__link-text">Purchase</span>
                    </a>
                  </li>
                  <li class="m-nav__item m-nav__item--last">
                    <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
                      <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                    </a>
                  </li>
                </ul> -->
              </div>
            </div>
          </div>
        </div>
      </footer>
        
      <!-- end::Footer -->

{{ SiteHelpers::showNotification() }} 

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {

   setInterval(function(){ 
     // var noteurl = $('.notif-value').attr('code'); 
        $.get('{{ url("home/load") }}',function(data){
          $('.notif-alert').html(data.total);
          var html = '';
          $.each( data.note, function( key, val ) {
           html += '<li><a href="'+val.url+'"><div class="icon-circle bg-light-green"><i class="'+val.icon+'"></i></div><div class="menu-info"><h4>'+val.title+'</h4><p>'+val.text+'</p> <p><i class="material-icons">access_time</i>'+val.date+'</p> </div></a></li>' ;
            });
          $('#notification-menu').html(html); 
        });

    }, 60000); 
})

</script>


<?php /*
<!-- odr -->
<link rel="stylesheet" href="{{ asset('../odr/style.css') }}" type="text/css" />
<script type="text/javascript" src="{{ asset('../odr/odr.js.php') }}"></script>
<!-- /odr -->
*/ ?>


@section('pageLevelScripts')
@show
</body>
</html>