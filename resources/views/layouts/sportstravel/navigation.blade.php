<?php  $menus = SiteHelpers::menus('top') ;?>

<nav role="navigation" id="custom_navigation">

    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
       <li class="m-menu__item  @if(URL::current() == URL::to('/')) m-menu__item--active @endif " aria-haspopup="true">
       <!-- 
        <a href="{{ url('') }}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text"> Home </span></a>
       -->
       </li>

        @foreach ($menus as $menu)
            @if($menu['module'] =='separator')
            <li class="divider"></li>
            @else
                <li class="m-menu__item @if(count($menu['childs']) > 0 )dropdown @endif @if (strpos(URL::current(), $menu['module']) !== false) m-menu__item--active @endif " m-menu-submenu-toggle="click" ><!-- HOME -->
                    <a class="m-menu__link @if(count($menu['childs']) > 0 ) m-menu__toggle @endif" 
                    @if($menu['menu_type'] =='external')
                        href="{{ URL::to($menu['url'])}}" 
                    @else
                        href="{{ URL::to($menu['module'])}}" 
                    @endif >
                        <i class="{{$menu['menu_icons']}}"></i> 

                        @if(config('sximo.cnf_multilang') ==1 && isset($menu['menu_lang']['title'][session('lang')]) && $menu['menu_lang']['title'][session('lang')]!='')
                            {{ $menu['menu_lang']['title'][session('lang')] }}
                        @else
                            {{$menu['menu_name']}}
                        @endif 

                    </a> 
                    @if(count($menu['childs']) > 0)

                    <ul class="m-menu__subnav">

                    @foreach ($menu['childs'] as $menu2)
                        @if($menu2['module'] =='separator')
                            <li class="divider"> </li>        
                        @else
                        <li class="m-menu__item 
                            @if(Request::is($menu2['module'])) m-menu__item--active @endif">
                            <a class="m-menu__link " 
                                @if($menu2['menu_type'] =='external')
                                    href="{{ url($menu2['url'])}}" 
                                @else
                                    href="{{ url($menu2['module'])}}" 
                                @endif
                                            
                            >

                            @if(config('sximo.cnf_multilang') ==1 && isset($menu2['menu_lang']['title'][session('lang')]))
                                {{ $menu2['menu_lang']['title'][session('lang')] }}
                            @else
                                {{$menu2['menu_name']}}
                            @endif 
                            </a>
                        @endif
                     @endforeach     
                    </ul>

                    @endif
                </li>
            @endif
        @endforeach 

    </ul>


</nav>

