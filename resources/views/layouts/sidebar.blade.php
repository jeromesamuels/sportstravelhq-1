<?php $sidebar = SiteHelpers::menus('sidebar') ;?>

 <div class="navbar"> </div>
 <div class="menu">
       <ul class="list">

            <li>
                <a href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>

            @foreach ($sidebar as $menu)
            <li @if(Request::segment(1) == $menu['module']) class="active" @endif>
            @if($menu['module'] =='separator')
            <li class="header"> <span> {{$menu['menu_name']}} </span></li>
            @else

                <a data-toggle="tooltip" title="{{  $menu['menu_name'] }}" data-placement="right" 
                    @if(count($menu['childs']) > 0 ) 
                        href="javascript:void(0);" 

                    @elseif($menu['menu_type']=='external')
                        href="{{ $menu['url'] }}" 
                    @else
                        href="{{ URL::to($menu['module'])}}" 
                    @endif 
                
                 @if(count($menu['childs']) > 0 ) class="menu-toggle" @endif>
                    <i class="{{$menu['menu_icons']}}"></i> 
                    <span>
                        {{ (isset($menu['menu_lang']['title'][session('lang')]) ? $menu['menu_lang']['title'][session('lang')] : $menu['menu_name']) }}
                    </span> 
                </a> 
                @endif  

                @if(count($menu['childs']) > 0)
                    <ul class="ml-menu">
                        @foreach ($menu['childs'] as $menu2)
                         <li @if(Request::segment(1) == $menu2['module']) class="active" @endif>
                            <a  
                                @if($menu2['menu_type'] =='external')
                                    href="{{ $menu2['url']}}" 
                                @else
                                    href="{{ URL::to($menu2['module'])}}"  
                                @endif                                  
                            >
                            
                            
                            <span>{{ (isset($menu2['menu_lang']['title'][session('lang')]) ? $menu2['menu_lang']['title'][session('lang')] : $menu2['menu_name']) }}
                            </span></a> 
                            @if(count($menu2['childs']) > 0)
                            <ul class="nav nav-third-level">
                                @foreach($menu2['childs'] as $menu3)
                                    <li @if(Request::segment(1) == $menu3['module']) class="active" @endif>
                                        <a 
                                            @if($menu['menu_type'] =='external')
                                                href="{{ $menu3['url'] }}" 
                                            @else 
                                                href="{{ URL::to($menu3['module'])}}" 
                                            @endif 
                                        >
                                       
                                        <span> 
                                        {{ (isset($menu3['menu_lang']['title'][session('lang')]) ? $menu3['menu_lang']['title'][session('lang')] : $menu3['menu_name']) }} </span>
                                            
                                        </a>
                                    </li>   
                                @endforeach
                            </ul>
                            @endif                          
                        </li>                           
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>   
</div>