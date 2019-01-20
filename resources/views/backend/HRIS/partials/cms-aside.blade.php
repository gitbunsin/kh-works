
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
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav>
        <ul>
            @if(Auth::guard('admins')->user())
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
                            <li class="{{ Request::segment(2) == "user" ? "active" : " " }}">
                                <a href="{{url ('administration/user')}}">User</a>
                            </li>
                            {{--<li class="{{ Request::segment(2) == "userRole" ? "active" : " " }}">--}}
                                {{--<a href="{{url ('administration/userRole')}}">UserRole</a>--}}
                            {{--</li>--}}
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
                            <li class="{{ Request::segment(2) == "skills" ? "active" : " " }}">
                                <a href="{{ url('administration/skills') }}">Skills</a>
                            </li>
                            <li class="{{ Request::segment(2) == "education" ? "active" : " " }}">
                                <a href="{{ url('administration/education') }}">Education</a>
                            </li>
                            <li class="{{ Request::segment(2) == "license-types" ? "active" : " " }}">
                                <a href="{{ url('administration/license-types') }}">LicenseType</a>
                            </li>
                            <li class="{{ Request::segment(2) == "language" ? "active" : " " }}">
                                <a href="{{ url('administration/language') }}">Language</a>
                            </li>
                            <li class="{{ Request::segment(2) == "membership" ? "active" : " " }}">
                                <a href="{{ url('administration/membership') }}">Membership</a>
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
                                <a href=""> Email Configuration</a>
                            </li>
                            <li>
                                <a href=""> Email Subscription</a>
                            </li>
                            <li>
                                <a href=""> Localization </a>
                            </li>
                            <li>
                                <a href="">class Modules</a>
                            </li>
                            <li>
                                <a href=""><i class=""></i>Socia Media Authentication</a>
                            </li>
                            <li>
                                <a href="">Register OAuth Client</a>
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
                    <li class="{{ Request::segment(2) == "user_cv" ? "active" : " " }}">
                        <a href="{{ url('/administration/user_cv') }}">Query CV</a>
                    </li>
                    <li class="{{ Request::segment(2) == "post-jobs" ? "active" : " " }}">
                        <a href="{{ url('administration/post-jobs') }}">Post Vacancy</a>
                    </li>
                    <li class="{{ Request::segment(2) == "interview" ? "active" : " " }}">
                        <a href="{{ url('administration/interview') }}">InterView</a>
                    </li>
                    <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                        <a href="{{url('administration/candidate')}}">Candidate</a>
                    </li>
                    {{--<li class="{{ Request::segment(2) == "vacancy" ? "active" : " " }}">--}}
                        {{--<a href="{{url('administration/vacancy')}}">Vacancy</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            @endif
            @if(Auth::guard('employee')->user())
                <li class="{{ Request::segment(2) == "employee-info" ? "active" : " " }}">
                    <li>
                        <a href="#">
                            <i class="fa fa-lg fa-fw fa-table"></i>
                            <span class="menu-item-parent">My Info 2</span>
                        </a>
                        <ul>
                            <li class="{{ Request::segment(2) == "employee-personal-details" ? "active" : " " }}">
                                <a href="{{ url('/administration/employee-personal-details') }}"> Personal Details</a>
                            </li>
                            <li class="{{ Request::segment(2) == "employee-contact-details" ? "active" : " " }}">
                                <a href="{{ url('administration/employee-contact-details') }}"> Contact Details</a>
                            </li>
                            <li class="{{ Request::segment(2) == "employee-emergency-contact" ? "active" : " " }}">
                                <a href="{{ url('administration/employee-emergency-contact') }}">Emergency Contacts</a>
                            </li>
                            <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                <a href="{{url('administration/candidate')}}">Dependents</a>
                            </li>
                            <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                <a href="{{url('administration/candidate')}}">Immigration</a>
                            </li>
                            <li class="{{ Request::segment(2) == "employee-job" ? "active" : " " }}">
                                <a href="{{url('administration/employee-job')}}">Job</a>
                            </li>
                            <li class="{{ Request::segment(2) == "employee-salary" ? "active" : " " }}">
                                <a href="{{url('administration/employee-salary')}}">Salary</a>
                            </li>
                            <li class="{{ Request::segment(2) == "report-to" ? "active" : " " }}">
                                <a href="{{url('administration/report-to')}}">Report-to</a>
                            </li>
                            <li class="{{ Request::segment(2) == "employee-qualification" ? "active" : " " }}">
                                <a href="{{url('administration/employee-qualification')}}">Qualifications</a>
                            </li>
                            <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                <a href="{{url('administration/candidate')}}">Memberships</a>
                            </li>
                            {{--<li class="{{ Request::segment(2) == "vacancy" ? "active" : " " }}">--}}
                            {{--<a href="{{url('administration/vacancy')}}">Vacancy</a>--}}
                            {{--</li>--}}
                        </ul>
                    </li>
                    <li class="{{ Request::segment(2) == "employee-info" ? "active" : " " }}">
                        <a href="#"><i class="fa fa-lg fa-fw fa-caret-square-o-up"></i> <span class="menu-item-parent">Leave</span></a>
                    </li>
                    <li class="{{ Request::segment(2) == "employee-info" ? "active" : " " }}">
                        <a href="#"><i class="fa fa-lg fa-fw fa-send-o"></i> <span class="menu-item-parent">Performance</span></a>
                    </li>
            @endif
        </ul>
    </nav>
</aside>