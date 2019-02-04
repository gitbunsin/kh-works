
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
                                <li class="{{ Request::segment(2) == "locations" ? "active" : " " }}">
                                    <a href="{{ url('administration/locations') }}">Locations</a>
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
                        <li class="{{ Request::segment(2) == "nationality" ? "active" : " " }}">
                            <a href="{{ url('administration/nationality') }}">Nationalities</a>
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
                                <li class="{{ Request::segment(2) == "view-module" ? "active" : " " }}">
                                    <a href="{{ url('administration/view-module') }}">Module</a>
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
                            <a href="#">Configuration</a>
                            <ul>
                                <li class="{{ Request::segment(2) == "termination-reason" ? "active" : " " }}">
                                    <a href="{{url('administration/termination-reason')}}">Termination Reasons</a>
                                </li>
                            </ul>
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
                @php $module = \App\Module::all(); @endphp
               @foreach($module as $modules)
                   @if($modules->key_name == "my_info" && $modules->status == "true")
                        <li class="{{ Request::segment(2) == "employee-info" ? "active" : " " }}">
                        <li>

                            <a href="#">
                                <i class="fa fa-lg fa-fw fa-table"></i>
                                <span class="menu-item-parent">My Info </span>
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
                            </ul>
                        </li>
                        @endif
                    @if($modules->key_name == "leave" && $modules->status == "true")

                           <li class="{{ Request::segment(2) == "employee-info" ? "active" : " " }}">
                               <a href="#">
                                   <i class="fa fa-lg fa-fw fa-caret-square-o-up"></i> <span class="menu-item-parent">Leave</span>
                               </a>

                               <ul>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Apply</a>
                                   </li><li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Entitlement</a>
                                   </li>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">My Leave</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> Add Entitlement </a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-performance-trackers')}}"> Employee Entitlement</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-performance-trackers')}}"> My Entitlement</a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Reports</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> Leave Entitlement and usage Report</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-performance-trackers')}}"> My Entitlement and usage Report </a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Configure</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "define-leave-period" ? "active" : " " }}">
                                               <a href="{{url('administration/define-leave-period')}}">Leave Period</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "leave-type" ? "active" : " " }}">
                                               <a href="{{url('administration/leave-type')}}"> Leave Type</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "define-workweek" ? "active" : " " }}">
                                               <a href="{{url('administration/define-workweek')}}"> Work Week</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "define-holiday" ? "active" : " " }}">
                                               <a href="{{url('administration/define-holiday')}}"> Holidays</a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li>
                                   <li class="{{ Request::segment(2) == "define-leave-list" ? "active" : " " }}">
                                       <a href="{{url('administration/define-leave-list')}}"> Leave List</a>
                                   </li>
                                   </li>
                                   <li class="{{ Request::segment(2) == "assign-leave" ? "active" : " " }}">
                                       <a href="{{url('administration/assign-leave')}}"> Assign Leave</a>
                                   </li>
                               </ul>
                           </li>

                    @endif
                   @if($modules->key_name == "time" && $modules->status == "true")

                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                               <a href="#"><i class="fa fa-lg fa-fw fa-send-o"></i> <span class="menu-item-parent">Time</span></a>
                               <ul>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Time Sheet</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> Employee TimeSheet</a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Attendances</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-performance-review')}}">Employee Record</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/my-review')}}">Configuration</a>
                                           </li>
                                       </ul>
                                   <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                       <a href="{{url('administration/my-performance-tracker-list')}}">Report</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> Project Report</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> Employee Report</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> Attendances Summary</a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li class="{{ Request::segment(2) == "" ? "active" : " " }}">
                                       <a href="#">Project Info</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "customer-project" ? "active" : " " }}">
                                               <a href="{{url('administration/customer-project')}}"> Customer Project</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "defined-project" ? "active" : " " }}">
                                               <a href="{{url('administration/defined-project')}}"> Projects</a>
                                           </li>
                                       </ul>
                                   </li>
                                   </li>
                               </ul>
                           </li>

                   @endif
                   @if($modules->key_name =="performance" && $modules->status == "true")

                           <li class="{{ Request::segment(2) == "employee-info" ? "active" : " " }}">
                               <a href="#"><i class="fa fa-lg fa-fw fa-send-o"></i> <span class="menu-item-parent">Performance</span></a>
                               <ul>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Configure</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "employee-kpi" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-kpi')}}"> KPIs</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "employee-performance-trackers" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-performance-trackers')}}"> Tracker</a>
                                           </li>
                                       </ul>
                                   </li>
                                   <li class="{{ Request::segment(2) == "candidate" ? "active" : " " }}">
                                       <a href="#">Manage Reviews</a>
                                       <ul>
                                           <li class="{{ Request::segment(2) == "employee-performance-review" ? "active" : " " }}">
                                               <a href="{{url('administration/employee-performance-review')}}">Manage Reviews</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "my-review" ? "active" : " " }}">
                                               <a href="{{url('administration/my-review')}}">My Reviews</a>
                                           </li>
                                           <li class="{{ Request::segment(2) == "evaluate-performance-review" ? "active" : " " }}">
                                               <a href="{{url('administration/evaluate-performance-review')}}">Review List</a>
                                           </li>
                                           </li>
                                       </ul>
                                   <li class="{{ Request::segment(2) == "my-performance-tracker-list" ? "active" : " " }}">
                                       <a href="{{url('administration/my-performance-tracker-list')}}">My Trackers</a>
                                   </li>
                                   <li class="{{ Request::segment(2) == "employee-trackers" ? "active" : " " }}">
                                       <a href="{{url('administration/employee-trackers')}}">Employee Trackers</a>
                                   </li>
                                   </li>

                               </ul>

                           </li>
                       @endif
                   @if($modules->key_name =="directory" && $modules->status == "true")
                           <li class="#">
                               <a href="#"><i class="fa fa-lg fa-fw fa-caret-square-o-up"></i> <span class="menu-item-parent">Directory</span></a>
                           </li>
                   @endif
                    @endforeach
                        @endif

        </ul>
    </nav>
</aside>