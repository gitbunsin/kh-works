@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="pull-right">
                    <a href="{{url('administration/jobs-title/create')}}"><h4 class="alert-heading"><i style="font-size:30px;" class="fa fa-plus-square"></i></h4></a>
                </div>
                <br/><br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2> List All Job Title</h2>
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
                                    <th data-hide="phone">Job Title</th>
                                    <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>Job Description</th>
                                    <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>Note</th>
                                    <th data-hide="phone">status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list">
                                @foreach($JobTitle as $jobs)
                                    <tr id="job_id{{$jobs->id}}">
                                        <td>{{$jobs->job_title}}</td>
                                        <td>{{$jobs->job_description}}</td>
                                        <td>{{$jobs->note}}</td>
                                        <td>{{$jobs->is_deleted}}</td>
                                            {{--<a href="{{ url('administration/job/' . $jobs->id . '/edit') }}"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></a>--}}
                                            {{--<form action="{{url('administration/job/' . $jobs->id)}}" method="post">--}}
                                                {{--{{csrf_field()}}--}}
                                                {{--<input name="_method" type="hidden" value="DELETE">--}}
                                                {{--<a href="{{ url('administration/job/' . $jobs->id) }}"><button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></a>--}}
                                            {{--</form>--}}
                                        <td>
                                            <a href="#" style="text-decoration:none;" class="btn-detail">
                                                <i class="fa fa-history help-tip " oldtitle="History" title="History" ></i>
                                            </a>
                                            <a href="#" data-id="{{$jobs->id}}" style="text-decoration:none;" class="open_modal">
                                                <i class="fa fa-edit" title="Edit Sender Id Detail" style="color:green;"></i>
                                            </a>
                                            <a href="" style="text-decoration:none;">
                                                <i class="fa fa-trash deleteRecord" title="Delete Sender Id" style="color:red;"></i>
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
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Job</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-3 control-label">Job Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Job Title" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDetail" class="col-sm-3 control-label">Job Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Job Description" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textarea" class="col-sm-3 control-label">Noted</label>
                                <div class="col-sm-9">
                                        <textarea name="noted" id="noted" class="form-control" rows="8" cols="5"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save Changes</button>
                        <input type="hidden" id="product_id" name="product_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
        }
    </script>
    <script type="text/javascript">
        var url = $('#url').val();
        //alert(url);
        $(document).on('click','.open_modal',function(){
            var Job_id = $(this).attr('data-id');
            //alert(Job_id);
            // Populate Data in Edit Modal Form
            //('administration/job/' . $jobs->id . '/edit')
            $.ajax({
                type: "GET",
                url: url + '/' + Job_id,
                success: function (data) {
                      $('#product_id').val(data.id);
                      $('#name').val(data.job_title);
                      $('#description').val(data.job_description);
                      $('#noted').val(data.note);
                    $('#btn-save').val("update");
                    $('#myModal').modal('show');
                    $(".modal-backdrop.in").hide();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        //create new product / update existing product ***************************
        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var job_id = $('#product_id').val();
            e.preventDefault();
            var formData = {
                name: $('#name').val(),
                description: $('#description').val(),
                note:$('#noted').val(),
            }
            //alert(JSON.stringify(formData));
            $.ajax({
                type: "PUT",
                cache: false,
                url: url + '/' + job_id,
                data: formData,
                dataType: "Json",
                success: function (data) {
                    alert(JSON.stringify(data));
                    var table =
                        '<tr id="job_id '+data.id+'">' +
                        '<td class="sorting_1">' + data.job_title + '</td>'+
                        '<td class="sorting_1">' + data.job_description + '</td>'+
                        '<td class="sorting_1">' + data.note + '</td>' +
                        '<td class="sorting_1">' + data.is_deleted + '</td>';
                        table += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button></td></tr>';
                    $("#job_id" + job_id).replaceWith(table);
                    $('#frmProducts').trigger("reset");
                    $('#myModal').modal('hide')
                },
                error: function (data) {
                    alert(JSON.stringify(data));
                    //alert('failed');
                }
            });
        });




        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();

            /* // DOM Position key index //

            l - Length changing (dropdown)
            f - Filtering input (search)
            t - The Table! (datatable)
            i - Information (records)
            p - Pagination (paging)
            r - pRocessing
            < and > - div elements
            <"#id" and > - div with an id
            <"class" and > - div with a class
            <"#id.class" and > - div with an id and class

            Also see: http://legacy.datatables.net/usage/features
            */

            /* BASIC ;*/
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;

            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

            /* END BASIC */

            /* COLUMN FILTER  */
            var otable = $('#datatable_fixed_column').DataTable({
                //"bFilter": false,
                //"bInfo": false,
                //"bLengthChange": false
                //"bAutoWidth": false,
                //"bPaginate": false,
                //"bStateSave": true // saves sort state using localStorage
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_fixed_column) {
                        responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_fixed_column.respond();
                }

            });

            // custom toolbar
            $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

            // Apply the filter
            $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

                otable
                    .column( $(this).parent().index()+':visible' )
                    .search( this.value )
                    .draw();

            } );
            /* END COLUMN FILTER */

            /* COLUMN SHOW - HIDE */
            $('#datatable_col_reorder').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_col_reorder) {
                        responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_col_reorder.respond();
                }
            });

            /* END COLUMN SHOW - HIDE */

            /* TABLETOOLS */
            $('#datatable_tabletools').dataTable({

                // Tabletools options:
                //   https://datatables.net/extensions/tabletools/button_options
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
                "oTableTools": {
                    "aButtons": [
                        "copy",
                        "csv",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sTitle": "SmartAdmin_PDF",
                            "sPdfMessage": "SmartAdmin PDF Export",
                            "sPdfSize": "letter"
                        },
                        {
                            "sExtends": "print",
                            "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                        }
                    ],
                    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
                },
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_datatable_tabletools) {
                        responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_datatable_tabletools.respond();
                }
            });

            /* END TABLETOOLS */

        })

    </script>

    <!-- Your GOOGLE ANALYTICS CODE Below -->
    <!-- Your GOOGLE ANALYTICS CODE Below -->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
@endsection