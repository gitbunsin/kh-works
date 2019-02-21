@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Leave Period</h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <form id="frmLeavePeriod" method="POST" enctype="multipart/form-data" action="{{url('administration/define-leave-period')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Month </label>
                                            <label class="select">
                                                <select id="bmonth" name="bmonth" required>
                                                    <option value="">Select Month</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label"> Day </label>
                                            <label class="select">
                                                <select id="bday" name="bday" required>
                                                    <option value="">Select Day</option>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <div>
                                        <p>Current Leave Period: </p>
                                        <p id="resultEndDate"></p>
                                    </div>
                                </fieldset>
                                <footer>
                                    {{--<button type="button" id="btnSaveDate" class="btn btn-primary">Save</button>--}}
                                    <button class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->

                    </div>
                </div>
            </article>
        </div>
    </section>

@endsection
@section('script')
    <script type="text/javascript">
        var monthLists = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];

        showDayAndMonthFromBO();

        function showDayAndMonthFromBO(){
            var statusLeavePeriod = "{{$status}}";
            if(statusLeavePeriod=="true"){
                var lastDayBO = "{{$getLastPeriod['leave_period_start_day']}}";
                var lastMonthBO = "{{$getLastPeriod['leave_period_start_month']}}";
                for (var i = 0; i < monthLists.length; i++) {
                    factLength = i + 1;
                    if(lastMonthBO== factLength){
                        $('#bmonth').append($("<option selected></option>").attr("value", factLength).text(monthLists[i]));
                    }
                    else{
                        $('#bmonth').append($("<option></option>").attr("value", factLength).text(monthLists[i]));
                    }
                }
                var daysInSelectedMonth = daysInMonth(lastMonthBO, {{date('Y')}});
                for (var i = 1; i <= daysInSelectedMonth; i++) {
                    if(lastDayBO==i){
                        $('#bday').append($("<option selected></option>").attr("value", i).text(i));
                    }
                    else{
                        $('#bday').append($("<option></option>").attr("value", i).text(i));
                    }
                }
                calculatePeriod();
            }
            else{
                for (var i = 0; i < monthLists.length; i++) {
                    factLength = i + 1;
                    $('#bmonth').append($("<option></option>").attr("value", factLength).text(monthLists[i]));
                }
            }

        }

        function daysInMonth(month, year) {
            return new Date(year, month, 0).getDate();
        }

        $('#byear, #bmonth').change(function() {

            if ($('#bmonth').val().length > 0) {
                $('#bday').prop('disabled', false);
                $('#bday').find('option').remove();

                var daysInSelectedMonth = daysInMonth($('#bmonth').val(), {{date('Y')}});

                for (var i = 1; i <= daysInSelectedMonth; i++) {
                    $('#bday').append($("<option></option>").attr("value", i).text(i));
                }

            } else {
                $('#bday').prop('disabled', true);
            }

        });

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        $(document).ready(function() {
            $("#bmonth, #bday").on('change',function(){
                calculatePeriod();
            });
        });

        function calculatePeriod() {
            var dayValue = $('#bday').val();
            var monthValue = $('#bmonth').val();
            var yearValue = {{date('Y')}};
            if(dayValue>0 && monthValue>0 && yearValue>0){
                var resultStartDate = new Date(yearValue, monthValue-1, dayValue);
                var resultEndDate = new Date(yearValue + 1, monthValue-1, dayValue-1);
                var concatResultStartDate = resultStartDate.getFullYear() + "/" + (resultStartDate.getMonth() + 1).toString().padStart(2,'0') + "/" + resultStartDate.getDate().toString().padStart(2,'0');
                var concatResultEndDate = resultEndDate.getFullYear() + "/" + (resultEndDate.getMonth() + 1).toString().padStart(2,'0') + "/" + resultEndDate.getDate().toString().padStart(2,'0');
                document.getElementById("resultEndDate").innerHTML=concatResultStartDate + ' to ' + concatResultEndDate;
            }
        }

    </script>
@endsection