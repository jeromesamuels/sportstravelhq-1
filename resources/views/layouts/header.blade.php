<style type="text/css">
  .stravel-nav { background: #333; display: none; }

  .stravel-nav ul {
    font-size: 0;
    margin: 0;
    padding: 0;
  }

  .stravel-nav ul li {
    display: inline-block;
    position: relative;
  }

  .stravel-nav ul li a {
    color: #fff;
    display: block;
    font-size: 14px;
    padding: 15px 14px;
    transition: 0.3s linear;
    text-decoration: none;
  }

  .stravel-nav ul li:hover { background: #5ebce2; }

  .stravel-nav ul li ul {
    border-bottom: 5px solid #2ba0db;
    display: none;
    position: absolute;
    width: 250px;
  }

  .stravel-nav ul li ul li {
    border-top: 1px solid #444;
    display: block;
  }

  .stravel-nav ul li ul li:first-child { border-top: none; }

  .stravel-nav ul li ul li a {
    background: #373737;
    display: block;
    padding: 10px 14px;
  }

  .stravel-nav ul li ul li a:hover { background: #5ebce2; }


  /* Larger Screens Styling */
  @media only screen and (min-width: 768px) {
    .stravel-nav {
      display: block;
    }
  }

</style>

<nav class="navbar">
  <div class="container-fluid">
      <div class="navbar-header">
           <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
          <a href="javascript:void(0);" class="bars"></a>

          <a class="navbar-brand" href="{{ url('dashboard')}}">
            
            @if(file_exists(public_path().'/uploads/images/'.config('sximo')['cnf_logo']) && config('sximo')['cnf_logo'] !='')
                <img src="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" alt="{{ config('sximo')['cnf_appname'] }}" width="40" />
                @else
                <img src="{{ asset('uploads/logo.png')}}" alt="{{ config('sximo')['cnf_appname'] }}" width="40" />
                @endif
            
                <div> {{ config('sximo')['cnf_appname'] }} </div>
          </a>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav hide ">
              <li class="collapse" >
                  <a href="javascript:;"  class="sidemenu"  >
                      <i class="material-icons">menu</i>
                  </a>
             </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="sidemenu-bar">
                  <a href="{{ url('') }}" >
                      <i class="material-icons">place</i>
                  </a>
             </li>

            <!-- Notifications -->
            @if(config('sximo.cnf_multilang') ==1)
            <li class="dropdown tasks-menu ">
              <?php 
              $flag ='en';
              $langname = 'English'; 
              foreach(SiteHelpers::langOption() as $lang):
                if($lang['folder'] == session('lang') or $lang['folder'] == config('sximo.cnf_lang')) {
                  $flag = $lang['folder'];
                  $langname = $lang['name']; 
                }

              endforeach; ?>
              <a href="#"  data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img class="flag-lang" src="{{ asset('sximo5/images/flags/'.$flag.'.png') }}" width="16" height="12" alt="lang" /> {{ strtoupper($flag) }}
                <span class="hidden-xs">
                
                </span>
              </a>

               <ul class="dropdown-menu dropdown-menu-right icons-right">
                @foreach(SiteHelpers::langOption() as $lang)
                  <li><a href="{{ url('home/lang/'.$lang['folder'])}}"><img class="flag-lang" src="{{ asset('sximo5/images/flags/'. $lang['folder'].'.png')}}" width="16" height="11" alt="lang" /> {{ $lang['name'] }}</a></li>
                @endforeach 
              </ul>

            </li> 
            @endif 
                        
              <li class="dropdown">
                  <a href="javascript:void(0);"  data-toggle="dropdown" role="button">
                       <i class="material-icons">notifications</i>
                      <span class="label-count notif-alert">0</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="icon-circle bg-light-green">
                                        <i class="material-icons">person_add</i>
                                    </div>
                                    <div class="menu-info">
                                        <h4>12 new members joined</h4>
                                        <p>
                                            <i class="material-icons">access_time</i> 14 mins ago
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                     </li>
                  </ul>            
              </li> 

            @if(Auth::user()->group_id == 1 or Auth::user()->group_id == 2 ) 
            <li class="dropdown">
                  <a href="#" data-toggle="dropdown">
                        <i class="material-icons">tune</i>
                    </a>
                <ul class="dropdown-menu">
                     
    
                  <li ><a href="{{ url('core/users')}}">  @lang('core.m_users') <br /></a> </li> 

                @if(Auth::user()->group_id == 1) 
                    <li ><a href="{{ url('core/groups')}}">  @lang('core.m_groups') </a> </li>
                    <li><a href="{{ url('core/users/blast')}}">  @lang('core.m_blastemail') </a></li> 
                @endif

                    <li class="divider"></li>
                    <li><a href="{{ url('core/pages')}}">   @lang('core.m_pagecms')  </a></li>
                    <li ><a href="{{ url('core/posts')}}">  @lang('core.m_post')</a></li>
                   
                </ul>
            </li>
            @endif

            @if(Auth::user()->group_id == 1  )
            <li class="dropdown">
                  <a href="#"  data-toggle="dropdown">
                    <i class="material-icons">apps</i>
                  </a>    
                <ul class="dropdown-menu">
                  <li><a href="{{ url('') }}/sximo/config"> @lang('core.t_generalsetting') </a> </li> 
                  <li class="divider"></li>
                  <li><a href="{{ url('sximo/module')}}"> @lang('core.m_codebuilder')  </a> </li>
                  <li><a href="{{ url('sximo/rac')}}"> RestAPI Generator </a> </li> 
                  <li><a href="{{ url('sximo/tables')}}"> @lang('core.m_database') </a> </li>
                  <li><a href="{{ url('sximo/form')}}"> @lang('core.m_formbuilder') </a> </li>
                  <li><a href="{{ url('core/elfinder')}}"> Dropzone Media </a> </li>
                  <li class="divider"></li>
                  <li><a href="{{ url('sximo/menu')}}">  @lang('core.m_menu')</a> </li>              
                  <li> <a href="{{ url('sximo/code')}}"> @lang('core.m_sourceeditor') </a>  </li>
                  <li> <a href="{{ url('core/logs')}}"> @lang('core.m_logs') </a>  </li>
                  
                  <li> <a href="{{ url('sximo/config/clearlog')}}" class="clearCache"> @lang('core.m_clearcache')</a> </li>
                </ul>
            </li>
            @endif
 
          </ul>
      </div>        
  </div>



  <?php $sidebar = SiteHelpers::menus('sidebar') ;?>

  <div class="stravel-nav">
    <div class="container-fluid">
      <ul>


        @foreach ($sidebar as $menu)
          <li @if(Request::segment(1) == $menu['module']) class="active" @endif>
          @if($menu['module'] =='separator')
          <li class="header"> <span> {{$menu['menu_name']}} </span></li>
          @else

              <a data-toggle="tooltip" title="{{  $menu['menu_name'] }}" data-placement="right" 
                  @if(count($menu['childs']) > 0 ) 
                      href="javascript:void(0);" 

                  @elseif($menu['menu_type'] =='external')
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
  </div>


 </nav>







<script type="text/javascript">
  $('nav li').hover(
    function() {
      $('ul', this).stop().slideDown(200);
    },
    function() {
      $('ul', this).stop().slideUp(200);
    }
  );
</script>