<?php  $menus = SiteHelpers::menus('top') ;?>
<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
   <li class="m-menu__item  m-menu__item--active " aria-haspopup="true">
    <a href="{{ url('') }}" class="m-menu__link "><span class="m-menu__item-here"></span><span class="m-menu__link-text">Home</span></a>
   </li>

    @foreach ($menus as $menu)
        @if($menu['module'] =='separator')
        <li class="divider"></li>
        @else
            <li class="m-menu__item @if(count($menu['childs']) > 0 )  m-menu__item--submenu m-menu__item--rel @endif" m-menu-submenu-toggle="click" ><!-- HOME -->
                <a class="m-menu__link @if(count($menu['childs']) > 0 ) m-menu__toggle @endif" 
                @if($menu['menu_type'] =='external')
                    href="{{ URL::to($menu['url'])}}" 
                @else
                    href="{{ URL::to($menu['module'])}}" 
                @endif >
                    <i class="{{$menu['menu_icons']}}"></i> 
                    <span class="m-menu__item-here"></span>
                    <span class="m-menu__link-text">
                    @if(config('sximo.cnf_multilang') ==1 && isset($menu['menu_lang']['title'][session('lang')]) && $menu['menu_lang']['title'][session('lang')]!='')
                        {{ $menu['menu_lang']['title'][session('lang')] }}
                    @else
                        {{$menu['menu_name']}}
                    @endif 
                    </span>

                    @if(count($menu['childs']) > 0 )
                     <i class="m-menu__hor-arrow la la-angle-down"></i>
                     <i class="m-menu__ver-arrow la la-angle-right"></i>
                    @endif  
                </a> 
                @if(count($menu['childs']) > 0)


                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                <span class="m-menu__arrow m-menu__arrow--adjust" style="left: 56px;"></span>
                <ul class="m-menu__subnav">

                @foreach ($menu['childs'] as $menu2)
                    @if($menu2['module'] =='separator')
                        <li class="divider"> </li>        
                    @else
                    <li class="m-menu__item 
                        @if(Request::is($menu2['module'])) active @endif">
                        <a class="m-menu__link " 
                            @if($menu2['menu_type'] =='external')
                                href="{{ url($menu2['url'])}}" 
                            @else
                                href="{{ url($menu2['module'])}}" 
                            @endif
                                        
                        >
                            <span class="m-menu__item-here"></span>
                            <span class="m-menu__link-text">
                            @if(config('sximo.cnf_multilang') ==1 && isset($menu2['menu_lang']['title'][session('lang')]))
                                {{ $menu2['menu_lang']['title'][session('lang')] }}
                            @else
                                {{$menu2['menu_name']}}
                            @endif 
                            </span>
                        </a>
                    @endif
                 @endforeach     
                </ul>
                </div>
                @endif
            </li>
        @endif
    @endforeach 

</ul>
