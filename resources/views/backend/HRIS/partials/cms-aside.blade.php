
<aside id="left-panel">
    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="{{asset('img/avatars/sunny.png')}}" alt="me" class="online" />
                        <span>{{(Auth::guard('admins')->user()) ? Auth::guard('admins')->user()->name : Auth::guard('employee')->user()->email}}</span>
                        <i class="fa fa-angle-down"></i>
					</a>
				</span>
    </div>
    <nav>
                     <ul>
                         <li class="{{ Request::segment(2) == "Dashboard" ? "active" : " " }}">
                             <a href="{{url('/administration/Dashboard')}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
                         </li>
                          @php

                             // $icon = array("1"=>"fa-cube txt-color-blue",);
                          $i = 0;

                         @endphp

                         @foreach ($menus as $item)
                             <li>
                                 <a href="#">
                                     <i class="{{ config('menus.icons')[$i] }}"></i>
                                     <span class="menu-item-parent">{{$item->name}}</span>
                                 </a>
                                 @php
                                    $i++;
                                    if(count($item->sub_menu)>0){
                                 @endphp
                                 <ul>
                                         @foreach ($item->sub_menu as $sub_menu_one)
                                     <li class="{{ Request::segment(1).'/'.Request::segment(2) == "$sub_menu_one->link" ? "active" : " " }}">
                                         <a href="{{'/'.$sub_menu_one->link}}">{{$sub_menu_one->name}}</a>
                                        @php
                                            if(count($sub_menu_one->sub_menu)) {
                                        @endphp
                                         <ul>
                                             @foreach ($sub_menu_one->sub_menu as $sub_menu_two)
                                                <li class="{{ Request::segment(1).'/'.Request::segment(2) == "$sub_menu_two->link" ? "active" : " " }}">
                                                     <a href="{{'/'.$sub_menu_two->link}}">{{$sub_menu_two->name}}</a>
                                                 </li>
                                             @endforeach
                                         </ul>
                                         @php
                                            }
                                         @endphp
                                     </li>
                                     @endforeach
                                 </ul>
                                 @php
                                     }
                                 @endphp
                             </li>
                         @endforeach
                     </ul>
         </nav>
</aside>