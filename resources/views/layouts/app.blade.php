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
        <!-- Sximo 5 Main CSS -->
        <link href="{{ asset('sximo5/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('sximo5/css/all-themes.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script type="text/javascript" src="{{ asset('sximo5/sximo.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sximo5/js/sximo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sximo5/js/plugins/node-waves/waves.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sximo5/js/admin.js') }}"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <link href="{{ asset('frontend/sportstravel/vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/jstree/dist/themes/default/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/chartist/dist/chartist.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/vendors/flaticon/css/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/vendors/metronic/css/styles.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/vendors/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/assets/demo/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/sportstravel/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"/>
        <script src="{{ asset('frontend/sportstravel/vendors/jquery/dist/jquery.js') }}" type="text/javascript"></script>
        <style>
            .amenityFilter + * .select2-selection__rendered{
            border: 1px solid #dddddd !important;
            }
            #m_header{
            backface-visibility: hidden;
            z-index: 99;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            }
            .m-page .m-page__container {
            padding: 0 0px !important;
            }
            .pace-progress {
            transform: unset !important;
            }
            section.content {
            margin: 0;
            }
            .navbar-brand {
            padding: 0 0px;
            }
            #myNavbar li {
            padding: 0px 0px !important;
            margin: 0 14px;
            }
            body.close-sidemenu section.content {
            margin: 0;
            }
            .img-circle{
            object-fit: cover;
            }
            .navbar-brand img {
            display: block;
            }
            .m-body .m-content {
            padding: 0;
            }
            .page-content-wrapper{
            width:100%;
            }
            .cus-blackhead-part {
            width:100%;
            background-color: #000;
            padding: 10px 0;
            }
            .cus-blackhead-part ul li a:active {
            color: #fff;
            }
            .cus-blackhead-part .m-menu__nav li:active:after {
            content: '';
            background-image: url(../uploads/images/triangle.png);
            width: 60px;
            height: 20px;
            display: block;
            background-repeat: no-repeat;
            position: absolute;
            left: 0;
            right: 0;
            bottom: -29px;
            }
            .cus-blackhead-part .m-menu__nav li ul.ml-menu li:active:after, .cus-blackhead-part .m-menu__nav li ul.ml-menu li:hover:after {
            display: none !important;  
            }
            .cus-blackhead-part .m-menu__nav li ul.ml-menu li:hover {
            opacity: 1;
            display: block;
            visibility: visible;
            }
            .modal-header {
            display: block;
            }
            #myNavbar a {
            color: #88cee8;
            font-size: 17px;
            letter-spacing:1px;
            text-transform: uppercase;
            }
            .navbar-collapse {
            padding-right: 0;
            padding-left: 0;
            }
            #myNavbar li{
            padding: 0px 14px;
            }
            #myNavbar ul{
            margin: 0px 0 30px;
            }
            .m-header .m-header__top {
            background: #5dbbe0;
            height: 90px;
            }
            .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-nav__link-icon .m-nav__link-icon-wrapper > i {
            color: #5dbbe0;
            }
            .m-nav__link-icon-wrapper{
            background: #000;
            }
            .m-grid{
            background-color: #eee;
            }
            #myNavbar ul li ul {
            background: #5dbbe0;
            min-width: 200px;
            padding: 10px;
            z-index: 999;
            }
            #myNavbar ul li ul li a{
            color: #fff;
            font-size: 15px;
            }
            #myNavbar ul li ul li a:hover,#myNavbar ul li a:hover {
            color: #fff !important;
            }
            #myNavbar ul li a:active {
            color: #fff;
            }
            #myNavbar ul li:hover:after {
            content: '';
            background-image: url(http://13.92.240.159/demo/public/uploads/images/triangle.png);
            width: 60px;
            height: 20px;
            display: block;
            background-repeat: no-repeat;
            position: absolute;
            left: 0;
            margin: 0 auto;
            right: 0;
            bottom: -38px;
            }
            .info-boxes{
            margin: 10px 0;
            padding: 10px 0;
            font-size: 20px;
            }
            .sbox b {
            width: auto;
            }
            .pagination li,.page-item.disabled .page-link,.pagination > li > a,.page-item:last-child .page-link{
            border-radius: 50%;
            border: 1px solid #eee;
            }
            .page-item.active .page-link {
            background-color: #5dbbe0;
            border-color: #5dbbe0;
            border-radius: 50%;
            }
            .pagination{
            float: right;
            }
            .pagination>li>a, .pagination>li>span{
            padding: 6px 13px;
            }
            .ml-menu.dropdown-menu > li > a:hover, .dropdown-menu > .dropdown-item:hover {
            background: transparent;
            }
            .m-nav-sticky{margin-top:0px !important;}
            #custom_navigation ul li ul {
            margin-top: 0rem;
            }
            .sidebar,.right-sidebar,.sidebar .menu{
            top:0px !important;
            height: 0 !important;
            display: block;
            }
            .navbar {
            min-height: 0 !important;
            margin-bottom: 0 !important;
            }
            .nav{
            padding-inline-start: 0;
            }
            .pace-progress{
            transform: unset;
            }
            .cus-blackhead-part{
            margin-top: 80px;
            }
            .trips-dropdown ul li a,.trips-dropdown ul li button{
            padding: 7px 50px;
            }
            .hotel_range{
            background-color: #000;
            height: 6px;
            border-radius: 5px;
            }
            .skills {
            text-align: right;
            padding: 0;
            color: #000;
            }
            .final_range{
            width: 100%;
            background-color: #ddd;
            }
            .trips-dropdown ul li a, .trips-dropdown ul li button {
            padding: 7px 5px;
            text-align: center;
            margin: 0 auto;
            display: block;
            }
            .one, .two, .three, .four, .five, .six, .seven, .eight, .nine{
            position:absolute;
            margin-top:-2px;
            z-index:1;
            height:12px;
            width:12px;
            border-radius:25px;
            }
            .one{
            left:1%;
            }
            .two{
            left:12.5%;
            }
            .three{
            left:25%;
            }
            .four{
            left:37.5%;
            }
            .five{
            left:50%;
            }
            .six{
            left:62.5%;
            }
            .seven{
            left:75%;
            }
            .eight{
            left:87.5%;
            }
            .nine{
            left:98%;
            }
            .success-color{
            background-color:#44c8f5;
            }
            .no-color{
            background-color:#afafaf;
            }
            .progress .progress-bar {
            line-height: 10px;
            background-color: #dddede;
            box-shadow: none;
            }
            .progress{
            height: 8px;
            }
            #progress_bar{
            margin-top: 40px;
            background: #f5f5f5;
            padding: 25px 50px;
            height: 150px;
            }
            .progress p{
            font-size: 16px;
            width: 60px;
            left: -15px;
            position: relative;
            padding-top: 20px;
            word-break: keep-all;
            color: #44c8f5;
            font-weight: bold;
            }
            .progress h6{
            left: -15px;
            position: relative;
            width: 90px;
            }
            .alert{
            display: none;
            }
            #show_div{
            margin-top: 5px;
            background: #f5f5f5;
            padding: 20px 120px;
            height: 175px;
            width: 100%;
            }
            .sbox {
            padding: 50px 15px;
            }
            .dropdown .dropdown-menu {
            display: none;
            opacity: 1;
            }
            .trips-dropdown-new{
            margin: -20px auto;
            float: none;
            top: -22px;
            }
            .fa.fa-caret-down{
            font-size: 30px;
            color:#dddddd;
            text-align: center;
            width: 100%;
            margin:0 auto;
            }
            .dropdown .dropdown-menu-new{
            opacity: 1;
            min-width: 100%;
            width: 1350px;
            background: transparent;
            left: 15% !important;
            border: 0;
            box-shadow: none;
            margin-top: -20px !important;
            transition: none;
            }
            .table-responsive {
            display: block;
            min-height: 500px;
            width: 100%;
            overflow-y: visible;
            overflow-x: hidden;
            }
            .modal-header {
            display: inline-block !important;
            }
            .status_detail{
            border-bottom: 2px solid #dedbdb;
            border-bottom-style: dotted;
            margin-bottom: 30px;
            padding-bottom: 15px;
            }
            .status_detail1{
            margin-bottom: 30px;
            padding-bottom: 25px;
            }
            .print-btn{
            text-align: center;
            border-radius: 20px !important;
            border: 2px solid #eee !important;
            width: 100px;
            height: 40px;
            padding: 8px;
            margin-right: 50px;
            }
            a.export,
            a.export:visited {
            display: inline-block;
            text-decoration: none;
            color: #000;
            padding: 10px;
            background-color: transparent;
            }
            .usertrips .pagination li.active a{
             background-color: #5dbbe0;
            border-color: #5dbbe0;
            }
            #usertrips_wrapper .row{
                width:100%;
            }
             .booking_h3{
            position: absolute;
            float: left;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }
            .booking_h3 h3{
            font-size:50px;
            color: #44c8f5;
            }
            .booking_h3 p{
            font-size: 14px;
            padding-top: 14px;
            }
            .dashboard-container .info-boxes {
            background: #eae7ee; 
            color: #240849;
            margin: 10px 0;
            padding: 10px 0;
            font-size: 20px;
            }
            .dashboard-container .info-boxes h3 {
            line-height: 20px;
            margin: 5px 0;
            }
            .dashboard-container .widget-box {
            margin: 10px;
            }
            .dashboard-container .widget-box .head {
            border-bottom: solid 1px #EEE;
            }
            .dashboard-container .widget-box .body table {
            width: 95%;
            margin: 10px auto;
            }
            .dashboard-container .widget-box .body table tr th {
            padding: 10px;
            background: #240849; 
            color: #FFFFFF;
            }
            .dashboard-container .widget-box .body table tr td {
            padding: 10px;
            border-bottom: solid 1px #EEE;
            }
            .dashboard-container .widget-box .body ul {
            list-style: none;
            padding: 0px;
            margin: 0;
            }
            .dashboard-container .widget-box .body ul li {
            padding: 10px;
            border-bottom: dotted 1px #EEE;
            }
            .dashboard-container .widget-box .body ul li strong {
            color: #e9955f
            }
            .dashboard-container .widget-box .head span {
            color: #240849;
            font-size: 16px;
            font-weight: bold;
            line-height: 50px;
            padding: 10px;
            }
             .state_report .details_button{
            border: 1px solid #eee !important;
            border-radius: 25px !important;
            width: 100px;
            color: #000;
            font-weight: normal;
            }
            .canvasjs-chart-toolbar{
            display: none;
            }
            .hotel_range{
            background-color: #000;
            height: 6px;
            border-radius: 5px;
            }
            .skills {
            text-align: right;
            padding: 0;
            color: #000;
            }
            .final_range{
            width: 100%;
            background-color: #ddd;
            }
            .box-shadow {
            -webkit-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
            -moz-box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
            box-shadow: 0px 2px 20px 0px rgba(153,153,153,0.5);
            }
            .page-header {
            margin-top: 25px;
            }
            .sbox b {
            text-align: left;
            }
           
        </style>
    </head>
    <body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default index-page sidebar-collapse">
        <div id="wrapper">
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
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end::Footer -->
        {{ SiteHelpers::showNotification() }} 
        <script type="text/javascript">
            $(window).load(function() {
              $("body").removeClass("pace-progress");
            });
        </script>
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
        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ asset('frontend/sportstravel/vendors/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/moment/min/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/wnumb/wNumb.js') }}" type="text/javascript"></script>
        <!--end:: Global Mandatory Vendors -->
        <!--begin:: Global Optional Vendors -->
        <script src="{{ asset('frontend/sportstravel/vendors/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('sximo5/js/plugins/jquery.jCombo.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sximo5/js/plugins/parsley.js') }}"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/autosize/dist/autosize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/summernote/dist/summernote.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/markdown/lib/markdown.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/forms/jquery-validation.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/jstree/dist/jstree.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/raphael/raphael.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/morris.js/morris.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/chartist/dist/chartist.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/charts/chart.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/sportstravel/vendors/js/framework/components/plugins/base/sweetalert2.init.js') }}" type="text/javascript"></script>
        <!--end:: Global Optional Vendors -->
        <!--begin::Global Theme Bundle -->
        <script src="{{ asset('frontend/sportstravel/assets/demo/base/scripts.bundle.js') }}" type="text/javascript"></script>
        <!--end::Global Theme Bundle -->
        <!--begin::Page Vendors -->
        <script src="{{ asset('frontend/sportstravel/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
        <!--end::Page Vendors -->
        <!--begin::Page Scripts -->
        <script src="{{ asset('frontend/sportstravel/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
        <script data-pace-options='{ "elements": { "selectors": [".selector"] }, "startOnPageLoad": false }' src="js/pace/pace.min.js"></script>
        @section('pageLevelScripts')
        @show
    </body>
</html>