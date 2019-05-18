<header id="header">
			<div id="logo-group">
				<span id="logo"> <img  style="width: 65px;padding-left: 3px;height: auto;" src="{{ asset('img/kh-works.png')}}" alt="SmartAdmin"> </span>
			</div>
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="{{url('logout')}}" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				{{--<ul class="header-dropdown-list hidden-xs">--}}
					{{--<li>--}}
						{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{url(asset('img/blank.gif'))}}" class="flag flag-us" alt="United States"> <span> English (US) </span> <i class="fa fa-angle-down"></i> </a>--}}
						{{--<ul class="dropdown-menu pull-right">--}}
							{{--<li class="">--}}
								{{--<a href="{{ url('locale/en') }}"><img src="{{url(asset('img/blank.gif'))}}" class="flag flag-us" alt="United States"> English (US)</a>--}}
							{{--</li>--}}
							{{--<li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>--}}
							{{--<li><a href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a></li>--}}

							{{--<li class="">--}}
								{{--<a href="{{ url('locale/kh') }}"><img src="{{url(asset('img/blank.gif'))}}" class="flag flag-kh" alt="Khmer"> Khmer (KH)</a>--}}
							{{--</li>--}}

						{{--</ul>--}}
					{{--</li>--}}
				{{--</ul>--}}

			</div>
			<!-- end pulled right: nav area -->
</header>
