
        <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- begin::Header -->
        <header id="m_header" class="m-grid__item m-header " m-minimize-mobile-offset="0">
            <div class="m-header__top">
                <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- begin::Brand -->
                        <div class="m-stack__item m-brand" style="background-color: transparent;">
                            <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a class="navbar-brand" href="{{ url('http://13.92.240.159/demo/public/dashboard') }}">
                                    <img src="{{ asset('uploads/images/Logo_white.png') }}" title="{{ config('sximo.cnf_appname') }}" alt="{{ config('sximo.cnf_appname') }}" height="40" >
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- begin::Responsive Header Menu Toggler -->
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
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" style="padding-right: 0;">
                                            <a href="{{ url('dashboard') }}" class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-profile-1" style="color: #000;font-size: 22px;"></i>
                                            <span class="m-nav__link-title">
                                            <span class="m-nav__link-wrap">
                                            <span class="m-nav__link-text"></span>
                                            </span>
                                            </span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center  m-dropdown--mobile-full-width" m-dropdown-toggle="click"
                                            m-dropdown-persistent="1">
                                            <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                            <span class="m-nav__link-icon">
                                            <span class="m-nav__link-icon-wrapper" style="background:transparent;">
                                            <i class="flaticon-alarm" style="color:#fff;"></i>
                                            </span>
                                            </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center" style="background: url({{ asset('frontend/sportstravel/assets/app/media/img/misc/notification_bg.jpg') }}; background-size: cover;">
                                                        <span class="m-dropdown__header-title" style="color: #5dbbe0;">9 New</span>
                                                        <span class="m-dropdown__header-subtitle" style="color: #5dbbe0;">User Notifications</span>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            This is notification content . . .
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                         
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                            m-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__userpic m--hide">
                                            <img src="http://13.92.240.159/demo/public/uploads/users/{{  Auth::user()->avatar }}" class="m--img-rounded m--marginless m--img-centered" width="50" height="50" alt="" />
                                            </span>
                                            <span class="m-topbar__username" style="color:#fff;">{{ Session::get('username') }}</span>
                                            <span class="m-topbar__welcome"><i class="fa fa-chevron-down" aria-hidden="true" style="color: #fff;padding-top: 5px;padding-left: 10px;"></i></span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center" style="background: url({{ asset('frontend/sportstravel/assets/app/media/img/misc/user_profile_bg.jpg') }}; background-size: cover;">
                                                        <div class="m-card-user m-card-user--skin-dark">
                                                            <div class="m-card-user__pic">
                                                                <img src="http://13.92.240.159/demo/public/uploads/users/{{ Auth::user()->avatar }}" class="m--img-rounded m--marginless"  width="50" height="50" alt="User" style="margin-top: 30px;" class="img-responsive">
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">{{ Session::get('fid') }}</span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">{{ Session::get('eid') }}</a>
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
                                                                    <a href="{{ url('dashboard') }}" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                    <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">Dashboard</span>
                                                                    </span>
                                                                    </span>
                                                                    </a>
                                                                </li>
                                                                <li class="m-nav__item">
                                                                    <a href="{{ url('user/profile?view=frontend') }}" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                    <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">{{ __('core.m_profile') }}</span>
                                                                    </span>
                                                                    </span>
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
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light">
                                            <img src="http://13.92.240.159/demo/public/uploads/users/{{ Auth::user()->avatar }}" class="m--img-rounded m--marginless" width="50" height="50" alt="User" style="margin-top:20px !important;" class="img-responsive"> 
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
            <div class="m-header__bottom" >
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
     
        <!-- end:: Page -->
         <div class="cus-blackhead-part">
            <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                <div class="row">
                 
                    <div class="collapse navbar-collapse" id="myNavbar">
                        @include('layouts.sportstravel.header_new')
                    </div>
                </div>
                <!-- end::Body -->
            </div>
        </div>
        <!-- begin::Quick Nav -->
        <ul class="m-nav-sticky" style="margin-top: 30px;display: none;">
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
  </div>