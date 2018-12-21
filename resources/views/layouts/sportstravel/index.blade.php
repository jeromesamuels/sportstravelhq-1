<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | {{ config('sximo.cnf_appname') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">



    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

    <!--end::Web font -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ asset('frontend/sportstravel/vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
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

    <!--end:: Global Optional Vendors -->



    <!--begin::Global Theme Styles -->
    <link href="{{ asset('frontend/sportstravel/assets/demo/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="{{ asset('frontend/sportstravel/assets/demo/base/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="{{ asset('frontend/sportstravel/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="{{ asset('frontend/sportstravel/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />-->


      
  </head>
  <!-- end::Head -->





  <!-- begin::Body -->
  <body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default index-page sidebar-collapse">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

      <!-- begin::Header -->
      <header id="m_header" class="m-grid__item m-header " m-minimize="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-header__top">
          <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
            <div class="m-stack m-stack--ver m-stack--desktop">

              <!-- begin::Brand -->
              <div class="m-stack__item m-brand">
                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                  <div class="m-stack__item m-stack__item--middle m-brand__logo">
                    <a class="navbar-brand" href="{{ url('') }}">
                     <img src="{{ asset('frontend/sportstravel/assets/images/logo_black.jpg') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" >
                    </a>
                  </div>
                  <div class="m-stack__item m-stack__item--middle m-brand__tools">


                    <!-- begin::Responsive Header Menu Toggler-->
                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                      <span></span>
                    </a>

                    <!-- end::Responsive Header Menu Toggler-->

                    <!-- begin::Topbar Toggler-->
                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                      <i class="flaticon-more"></i>
                    </a>

                    <!--end::Topbar Toggler-->
                  </div>
                </div>
              </div>

              <!-- end::Brand -->

              <!-- begin::Topbar -->
              <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                  <div class="m-stack__item m-topbar__nav-wrapper">


                  @if(Auth::check()) 
                    <ul class="m-topbar__nav m-nav m-nav--inline">
                      <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                       m-dropdown-toggle="click">
                        <a href="#" class="m-nav__link m-dropdown__toggle">
                          <span class="m-topbar__userpic m--hide">
                            <img src="{{ asset('frontend/sportstravel/assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless m--img-centered" alt="" />
                          </span>
                          <span class="m-topbar__welcome">Hello,&nbsp;</span>
                          <span class="m-topbar__username">Username</span>
                        </a>
                        <div class="m-dropdown__wrapper">
                          <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                          <div class="m-dropdown__inner">
                            <div class="m-dropdown__header m--align-center" style="background: url({{ asset('frontend/sportstravel/assets/app/media/img/misc/user_profile_bg.jpg') }}; background-size: cover;">
                              <div class="m-card-user m-card-user--skin-dark">
                                <div class="m-card-user__pic">
                                  <img src="{{ asset('frontend/sportstravel/assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless" alt="" />
                                </div>
                                <div class="m-card-user__details">
                                  <span class="m-card-user__name m--font-weight-500">Mark Andre</span>
                                  <a href="" class="m-card-user__email m--font-weight-300 m-link">mark.andre@gmail.com</a>
                                </div>
                              </div>
                            </div>
                            <div class="m-dropdown__body">
                              <div class="m-dropdown__content">
                                <ul class="m-nav m-nav--skin-light">
                                  <li class="m-nav__section m--hide">
                                    <span class="m-nav__section-text">Section</span>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="{{ url('user/profile?view=frontend') }}" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-profile-1"></i>
                                      <span class="m-nav__link-title">
                                        <span class="m-nav__link-wrap">
                                          <span class="m-nav__link-text">{{ __('core.m_profile') }}</span>
                                          <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
                                        </span>
                                      </span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="profile.html" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-share"></i>
                                      <span class="m-nav__link-text">Activity</span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="profile.html" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-chat-1"></i>
                                      <span class="m-nav__link-text">Messages</span>
                                    </a>
                                  </li>
                                  <li class="m-nav__separator m-nav__separator--fit">
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="profile.html" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-info"></i>
                                      <span class="m-nav__link-text">FAQ</span>
                                    </a>
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="profile.html" class="m-nav__link">
                                      <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                      <span class="m-nav__link-text">Support</span>
                                    </a>
                                  </li>
                                  <li class="m-nav__separator m-nav__separator--fit">
                                  </li>
                                  <li class="m-nav__item">
                                    <a href="{{ url('user/logout') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">{{ __('core.m_logout') }}</a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center  m-dropdown--mobile-full-width" m-dropdown-toggle="click"
                       m-dropdown-persistent="1">
                        <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                          <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
                          <span class="m-nav__link-icon">
                            <span class="m-nav__link-icon-wrapper">
                              <i class="flaticon-alarm"></i>
                            </span>
                          </span>
                        </a>
                        <div class="m-dropdown__wrapper">
                          <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                          <div class="m-dropdown__inner">
                            <div class="m-dropdown__header m--align-center" style="background: url({{ asset('frontend/sportstravel/assets/app/media/img/misc/notification_bg.jpg') }}; background-size: cover;">
                              <span class="m-dropdown__header-title">9 New</span>
                              <span class="m-dropdown__header-subtitle">User Notifications</span>
                            </div>
                            <div class="m-dropdown__body">
                              <div class="m-dropdown__content">
                                <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                  <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                      Alerts
                                    </a>
                                  </li>
                                  <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
                                  </li>
                                  <li class="nav-item m-tabs__item">
                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
                                  </li>
                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                    <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                      <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                            <span class="m-list-timeline__text">12 new users registered</span>
                                            <span class="m-list-timeline__time">Just now</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge"></span>
                                            <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                            <span class="m-list-timeline__time">14 mins</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge"></span>
                                            <span class="m-list-timeline__text">New invoice received</span>
                                            <span class="m-list-timeline__time">20 mins</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge"></span>
                                            <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                            <span class="m-list-timeline__time">1 hr</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge"></span>
                                            <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                            <span class="m-list-timeline__time">2 hrs</span>
                                          </div>
                                          <div class="m-list-timeline__item m-list-timeline__item--read">
                                            <span class="m-list-timeline__badge"></span>
                                            <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                            <span class="m-list-timeline__time">7 hrs</span>
                                          </div>
                                          <div class="m-list-timeline__item m-list-timeline__item--read">
                                            <span class="m-list-timeline__badge"></span>
                                            <span class="m-list-timeline__text">Production server down</span>
                                            <span class="m-list-timeline__time">3 hrs</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge"></span>
                                            <span class="m-list-timeline__text">Production server up</span>
                                            <span class="m-list-timeline__time">5 hrs</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                    <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                      <div class="m-list-timeline m-list-timeline--skin-light">
                                        <div class="m-list-timeline__items">
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                            <a href="" class="m-list-timeline__text">New order received</a>
                                            <span class="m-list-timeline__time">Just now</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                            <a href="" class="m-list-timeline__text">New invoice received</a>
                                            <span class="m-list-timeline__time">20 mins</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                            <a href="" class="m-list-timeline__text">Production server up</a>
                                            <span class="m-list-timeline__time">5 hrs</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                            <a href="" class="m-list-timeline__text">New order received</a>
                                            <span class="m-list-timeline__time">7 hrs</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                            <a href="" class="m-list-timeline__text">System shutdown</a>
                                            <span class="m-list-timeline__time">11 mins</span>
                                          </div>
                                          <div class="m-list-timeline__item">
                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                            <a href="" class="m-list-timeline__text">Production server down</a>
                                            <span class="m-list-timeline__time">3 hrs</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                    <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                      <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                        <span class="">All caught up!<br>No new logs.</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  @else
                      
                      <a class="m-menu__link " href="{{ url('user/login') }}" onclick="SximoModal(this.href , '{{ __('core.signin') }}'); return false;"> {{ __('core.signin') }} </a>


                      <a class="m-menu__link " href="{{ url('user/register') }}" onclick="SximoModal(this.href , '{{ __('core.signup') }}'); return false;"> {{ __('core.signup') }} </a>

                  @endif  

                  </div>
                </div>
              </div>

              <!-- end::Topbar -->
            </div>
          </div>
        </div>

        <div class="m-header__bottom">
          <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
            <div class="m-stack m-stack--ver m-stack--desktop">

              <!-- begin::Horizontal Menu -->
              <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
                  @include('layouts.sportstravel.navigation')
                </div>
              </div>

              <!-- end::Horizontal Menu -->

            </div>
          </div>
        </div>
      </header>

      <!-- end::Header -->

      <!-- begin::Body -->
      <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop  m-container m-container--responsive m-container--xxl m-page__container m-body">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
          <div class="m-content">
            <!-- Main Content Begin Here -->
            @include($pages)
            <!-- Main Content Begin Here -->
          </div>
        </div>

        <!--</div>-->
      </div>

      <!-- end::Body -->

      <!-- begin::Footer -->
      <footer class="m-grid__item m-footer ">
        <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
          <div class="m-footer__wrapper">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
              <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                  2017 &copy; Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
                </span>
              </div>
              <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
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
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- end::Footer -->
    </div>

    <!-- end:: Page -->

    <!-- begin::Quick Sidebar -->
    <div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
      <div class="m-quick-sidebar__content m--hide">
        <span id="m_quick_sidebar_close" class="m-quick-sidebar__close"><i class="la la-close"></i></span>
        <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
          <li class="nav-item m-tabs__item">
            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">Messages</a>
          </li>
          <li class="nav-item m-tabs__item">
            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">Settings</a>
          </li>
          <li class="nav-item m-tabs__item">
            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">Logs</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
            <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
              <div class="m-messenger__messages m-scrollable">
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--in">
                    <div class="m-messenger__message-pic">
                      <img src="{{ asset('frontend/sportstravel/assets/app/media/img//users/user3.jpg') }}" alt="" />
                    </div>
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-username">
                          Megan wrote
                        </div>
                        <div class="m-messenger__message-text">
                          Hi Bob. What time will be the meeting ?
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--out">
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-text">
                          Hi Megan. It's at 2.30PM
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--in">
                    <div class="m-messenger__message-pic">
                      <img src="{{ asset('frontend/sportstravel/assets/app/media/img//users/user3.jpg') }}" alt="" />
                    </div>
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-username">
                          Megan wrote
                        </div>
                        <div class="m-messenger__message-text">
                          Will the development team be joining ?
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--out">
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-text">
                          Yes sure. I invited them as well
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__datetime">2:30PM</div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--in">
                    <div class="m-messenger__message-pic">
                      <img src="{{ asset('frontend/sportstravel/assets/app/media/img//users/user3.jpg') }}" alt="" />
                    </div>
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-username">
                          Megan wrote
                        </div>
                        <div class="m-messenger__message-text">
                          Noted. For the Coca-Cola Mobile App project as well ?
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--out">
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-text">
                          Yes, sure.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--out">
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-text">
                          Please also prepare the quotation for the Loop CRM project as well.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__datetime">3:15PM</div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--in">
                    <div class="m-messenger__message-no-pic m--bg-fill-danger">
                      <span>M</span>
                    </div>
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-username">
                          Megan wrote
                        </div>
                        <div class="m-messenger__message-text">
                          Noted. I will prepare it.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--out">
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-text">
                          Thanks Megan. I will see you later.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m-messenger__wrapper">
                  <div class="m-messenger__message m-messenger__message--in">
                    <div class="m-messenger__message-pic">
                      <img src="{{ asset('frontend/sportstravel/assets/app/media/img//users/user3.jpg') }}" alt="" />
                    </div>
                    <div class="m-messenger__message-body">
                      <div class="m-messenger__message-arrow"></div>
                      <div class="m-messenger__message-content">
                        <div class="m-messenger__message-username">
                          Megan wrote
                        </div>
                        <div class="m-messenger__message-text">
                          Sure. See you in the meeting soon.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__seperator"></div>
              <div class="m-messenger__form">
                <div class="m-messenger__form-controls">
                  <input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
                </div>
                <div class="m-messenger__form-tools">
                  <a href="" class="m-messenger__form-attachment">
                    <i class="la la-paperclip"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="m_quick_sidebar_tabs_settings" role="tabpanel">
            <div class="m-list-settings m-scrollable">
              <div class="m-list-settings__group">
                <div class="m-list-settings__heading">General Settings</div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Email Notifications</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" checked="checked" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Site Tracking</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">SMS Alerts</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Backup Storage</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Audit Logs</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" checked="checked" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
              </div>
              <div class="m-list-settings__group">
                <div class="m-list-settings__heading">System Settings</div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">System Logs</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Error Reporting</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Applications Logs</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Backup Servers</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" checked="checked" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
                <div class="m-list-settings__item">
                  <span class="m-list-settings__item-label">Audit Logs</span>
                  <span class="m-list-settings__item-control">
                    <span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
                      <label>
                        <input type="checkbox" name="">
                        <span></span>
                      </label>
                    </span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="m_quick_sidebar_tabs_logs" role="tabpanel">
            <div class="m-list-timeline m-scrollable">
              <div class="m-list-timeline__group">
                <div class="m-list-timeline__heading">
                  System Logs
                </div>
                <div class="m-list-timeline__items">
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">12 new users registered <span class="m-badge m-badge--warning m-badge--wide">important</span></a>
                    <span class="m-list-timeline__time">Just now</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">System shutdown</a>
                    <span class="m-list-timeline__time">11 mins</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                    <a href="" class="m-list-timeline__text">New invoice received</a>
                    <span class="m-list-timeline__time">20 mins</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                    <a href="" class="m-list-timeline__text">Database overloaded 89% <span class="m-badge m-badge--success m-badge--wide">resolved</span></a>
                    <span class="m-list-timeline__time">1 hr</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">System error</a>
                    <span class="m-list-timeline__time">2 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">Production server down <span class="m-badge m-badge--danger m-badge--wide">pending</span></a>
                    <span class="m-list-timeline__time">3 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">Production server up</a>
                    <span class="m-list-timeline__time">5 hrs</span>
                  </div>
                </div>
              </div>
              <div class="m-list-timeline__group">
                <div class="m-list-timeline__heading">
                  Applications Logs
                </div>
                <div class="m-list-timeline__items">
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--info m-badge--wide">urgent</span></a>
                    <span class="m-list-timeline__time">7 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">12 new users registered</a>
                    <span class="m-list-timeline__time">Just now</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">System shutdown</a>
                    <span class="m-list-timeline__time">11 mins</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                    <a href="" class="m-list-timeline__text">New invoices received</a>
                    <span class="m-list-timeline__time">20 mins</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                    <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                    <span class="m-list-timeline__time">1 hr</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">System error <span class="m-badge m-badge--info m-badge--wide">pending</span></a>
                    <span class="m-list-timeline__time">2 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">Production server down</a>
                    <span class="m-list-timeline__time">3 hrs</span>
                  </div>
                </div>
              </div>
              <div class="m-list-timeline__group">
                <div class="m-list-timeline__heading">
                  Server Logs
                </div>
                <div class="m-list-timeline__items">
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">Production server up</a>
                    <span class="m-list-timeline__time">5 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">New order received</a>
                    <span class="m-list-timeline__time">7 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">12 new users registered</a>
                    <span class="m-list-timeline__time">Just now</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">System shutdown</a>
                    <span class="m-list-timeline__time">11 mins</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                    <a href="" class="m-list-timeline__text">New invoice received</a>
                    <span class="m-list-timeline__time">20 mins</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                    <a href="" class="m-list-timeline__text">Database overloaded 89%</a>
                    <span class="m-list-timeline__time">1 hr</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">System error</a>
                    <span class="m-list-timeline__time">2 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">Production server down</a>
                    <span class="m-list-timeline__time">3 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                    <a href="" class="m-list-timeline__text">Production server up</a>
                    <span class="m-list-timeline__time">5 hrs</span>
                  </div>
                  <div class="m-list-timeline__item">
                    <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                    <a href="" class="m-list-timeline__text">New order received</a>
                    <span class="m-list-timeline__time">1117 hrs</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- end::Quick Sidebar -->

    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
      <i class="la la-arrow-up"></i>
    </div>

    <!-- end::Scroll Top -->

    <!-- begin::Quick Nav -->
    <ul class="m-nav-sticky" style="margin-top: 30px;">
      <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
      </li>
      <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
        <a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
      </li>
      <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
        <a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank"><i class="la la-life-ring"></i></a>
      </li>
    </ul>

    <!-- begin::Quick Nav -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('frontend/sportstravel/vendors/jquery/dist/jquery.js') }}" type="text/javascript"></script>
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


  </body>

  <!-- end::Body -->
</html>
