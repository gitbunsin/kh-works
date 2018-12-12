
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->
{{--{{Session::get('user_data')->status}}--}}
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="{{asset('img/avatars/sunny.png')}}" alt="me" class="online" />
                       {{--{{ Auth::tbl_organization_gen_info()->name }}--}}
                        @if(Auth::guard('admins')->check())

                            {{Auth::guard('admins')->user()->name}}

                        @endif
                        {{--@if(Session::get('user_register'))--}}
                            {{--<span>--}}
                                {{--{{ Session::get('user_register')->name }}--}}
                            {{--</span>--}}
                        {{--@elseif(Session::get('company_log'))--}}
                            {{--<span>--}}
                                  {{--{{ Session::get('company_log')->name }}--}}
                             {{--</span>--}}
                        {{--@endif--}}

                        {{--{{Auth::guard('admins')->name}}--}}
                        <i class="fa fa-angle-down"></i>
					</a>
				</span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            <li>
                <a href="" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-lg fa-fw fa-bar-chart-o"></i>
                    <span class="menu-item-parent">Admin</span>
                </a>
                <ul>
                    <li>
                        <a href="#">User management</a>
                        <ul>
                            <li>
                                <a href=""><i class="fa fa-plane"></i>Users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Job</a>
                        <ul>

                            <li class="{{ Request::segment(2) == "jobs-title" ? "active" : " " }}">
                                <a href="{{url ('administration/jobs-title')}}">Job Title</a>
                            </li>

                            <li class="{{ Request::segment(2) == "jobs-category" ? "active" : " " }}">
                                <a href="{{url ('administration/jobs-category')}}">Job Cateogry</a>
                            </li>
                            <li class="{{ Request::segment(2) == "pay-grade" ? "active" : " " }}">
                               <a href="{{url ('administration/pay-grade')}}">Pay Grades</a>
                            </li>
                            <li class="{{ Request::segment(2) == "employment-status" ? "active" : " " }}">
                                <a href="{{url ('administration/employment-status')}}">Employee Status</a>
                            </li>
                            <li class=" {{ Request::segment(2) == "work-shift" ? "active" : " " }}">
                                <a href="{{url ('administration/work-shift')}}">Works Shifts</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Organization</a>
                        <ul>
                            <li class="{{ Request::segment(2) == "companyProfile" ? "active" : " " }}">
                                <a href="{{ url('administration/companyProfile') }}">General Information</a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="">General Information</a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="">Locations</a>
                            </li>
                            <li>
                                <a href="">Stature</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Qualifications </a>
                        <ul>
                            <li>
                                <a href="fa.html"><i class="fa fa-plane"></i>Skills</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class="fa fa-plane"></i>Education</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class="fa fa-plane"></i>Licenses</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class="fa fa-plane"></i>Language</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class="fa fa-plane"></i>Memberships</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="#">Nationalities<span class="badge pull-right inbox-badge bg-color-yellow"></span></a>
                    </li>
                    <li>
                        <a href="#">Configuration<span class="badge pull-right inbox-badge bg-color-yellow"></span></a>
                        <ul>
                            <li>
                                <a href="fa.html"><i class=""></i>Email Configuration</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class=""></i>Email Subscription</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class=""></i>Localization </a>
                            </li>
                            <li>
                                <a href="fa.html"><i class=""></i>Modules</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class=""></i>Socia Media Authentication</a>
                            </li>
                            <li>
                                <a href="fa.html"><i class=""></i>Register OAuth Client</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">PIM</span></a>
                <ul>
                    <li>
                        <a href="table.html">Configuration</a>
                    </li>
                    <li class="{{ Request::segment(2) == "employee" ? "active" : " " }}">
                        <a href="{{ url('administration/employee') }}">List of employees</a>
                    </li>
                    <li class="{{ Request::segment(2) == "create" ? "active" : " " }}">
                        <a href="{{url('administration/employee/create')}}">Add Employee</a>
                    </li>
                    <li>
                        <a href="#">Reports</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">Recruitment</span></a>
                <ul>
                    <li class="{{ Request::segment(2) == "Cv" ? "active" : " " }}">
                        <a href="{{ url('administration/Cv') }}">Query CV</a>
                    </li>
                    <li class="{{ Request::segment(2) == "post-jobs" ? "active" : " " }}">
                        <a href="{{ url('administration/post-jobs') }}">Jobs</a>
                    </li>
                    <li class="{{ Request::segment(2) == "interview" ? "active" : " " }}">
                        <a href="{{ url('administration/interview') }}">InterView</a>
                    </li>
                    <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                        <a href="{{url('administration/candidate')}}">Candidate</a>
                    </li>
                    <li class="{{ Request::segment(2) == "vacancy" ? "active" : " " }}">
                        <a href="{{url('administration/vacancy')}}">Vacancy</a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
</aside>