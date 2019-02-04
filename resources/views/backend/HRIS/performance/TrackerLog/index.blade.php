@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="tracker_log" >
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2> Manage Performance Tracker Log </h2>
                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <form id="frmLog" method="POST" enctype="multipart/form-data" action="{{url('administration/performance-tracker-log')}}" class="">
                            <div class="widget-body">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="log_id">
                                    <fieldset class="smart-form">
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label"> Log</label>
                                                <label class="input">
                                                    <input type="text" name="log" id="log">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label"> Achievement</label>
                                                <label class="select">
                                                    <select name="achievement" id="achievement" >
                                                        <option value="">-- select --</option>
                                                        <option value="1">Positive</option>
                                                        <option value="2">Negative</option>
                                                    </select>
                                                    <i></i>
                                                </label>
                                            </section>
                                        </div>
                                            <section>
                                                <label class="label">Comment</label>
                                                <label class="input">
                                                    <textarea id="comment" name="comment" rows="10" cols="165"></textarea>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                    </fieldset>
                                </div>
                            </div>
                            <br/>
                            <!-- end widget content -->
                            <fieldset class="smart-form">
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                    <br/>
                                </footer>
                            </fieldset>

                        </form>


                    </div>
                    <!-- end widget div -->
                    <br/>
                </div>
                <!-- end widget -->

            </article>
            <!-- END COL -->
        </div>
    </section>
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">

                        <div class="pull-right">
                            <a  style="background: #333;" class="btn btn-primary" href="#" id="add_log_id" role="button">
                                <i class="glyphicon glyphicon-plus-sign "></i> Add log</a>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> Admin Tracker Log</h2>
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
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th> Reviewer</th>
                                    <th> Log </th>
                                    <th> Comments</th>
                                    <th> Achievement</th>
                                    <th> Add Date</th>
                                    <th> Modified Date</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($t as $ts)
                                    <tr id="termination-reason">
                                        <td></td>
                                        <td>{{$ts->log}}</td>
                                        <td></td>
                                        @if($ts->achievement =="1")
                                        <td> Positive</td>
                                        @else
                                            <td>Negative</td>
                                        @endif
                                        <td>{{$ts->created_at}}</td>
                                        <td></td>
                                        <td>
                                            <a  href="{{url('/administration/employee-kpi/'.'/edit')}}" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="" href="#" style="text-decoration:none;" class="delete-item">
                                                <i class="glyphicon glyphicon-trash"  style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.tracker_log').hide();
        $('#add_log_id').click(function () {
           $('.tracker_log').show({
               duration:800,
           })

        });
        var $loginForm = $("#frmLog").validate({
            // Rules for form validation
            rules : {
                log : {
                    required : true
                },
                achievement : {
                    required : true
                }
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>


@endsection
