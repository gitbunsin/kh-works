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
                        <h2>Employee TimeSheets</h2>
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
                            <form id="frmEntitlement" method="POST" enctype="multipart/form-data" action="{{url('administration/define-holiday')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6" id="ShowEmployee">
                                            <label class="label">Employee Name</label>
                                            <div class="form-group">
                                                <select name="emp_number"
                                                        id="emp_number"
                                                        style="width:100%" class="select2 select2-hidden-accessible"
                                                        tabindex="-1" aria-hidden="true">
                                                    <option value="">-- select employee --</option>
                                                    @php $tracker = \App\Model\Employee::all(); @endphp
                                                    @foreach($tracker as $trackers)
                                                        <option value="{{$trackers->emp_number}}">{{$trackers->emp_lastname}}{{$trackers->emp_firstname}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="note">
                                                    <strong>Usage:</strong> Employee performance tracker
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary"> Views</button>
                                </footer>
                            </form>
                        </div>
                        <!-- end widget content -->
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">
            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <table id="jqgrid"></table>
                <div id="pjqgrid"></div>

                <br>
            </article>
        </div>
        <!-- end row -->
    </section>
@endsection
@section('script')
    <script src="{{asset('js/plugin/jqgrid/jquery.jqGrid.min.js')}}"></script>
    <script src="{{asset('js/plugin/jqgrid/grid.locale-en.min.js')}}"></script>
    <script>
            $(document).ready(function() {
            pageSetUp();

            var jqgrid_data = [{
            id : "1",
            date : "2007-10-01",
            name : "test",
            note : "note",
            amount : "200.00",
            tax : "10.00",
            total : "210.00"
            }, {
            id : "2",
            date : "2007-10-02",
            name : "test2",
            note : "note2",
            amount : "300.00",
            tax : "20.00",
            total : "320.00"
            }, {
            id : "5",
            date : "2007-10-05",
            name : "test2",
            note : "note2",
            amount : "300.00",
            tax : "20.00",
            total : "320.00"
            },{
            id : "17",
            date : "2007-10-03",
            name : "test2",
            note : "note2",
            amount : "300.00",
            tax : "20.00",
            total : "320.00"
            }, {
            id : "18",
            date : "2007-09-01",
            name : "test3",
            note : "note3",
            amount : "400.00",
            tax : "30.00",
            total : "430.00"
            }];

            jQuery("#jqgrid").jqGrid({
            data : jqgrid_data,
            datatype : "local",
            height : 'auto',
            colNames : ['Actions', 'Inv No', 'Date', 'Client', 'Amount', 'Tax', 'Total', 'Notes'],
            colModel : [{
            name : 'act',
            index : 'act',
            sortable : false
            }, {
            name : 'id',
            index : 'id'
            }, {
            name : 'date',
            index : 'date',
            editable : true
            }, {
            name : 'name',
            index : 'name',
            editable : true
            }, {
            name : 'amount',
            index : 'amount',
            align : "right",
            editable : true
            }, {
            name : 'tax',
            index : 'tax',
            align : "right",
            editable : true
            }, {
            name : 'total',
            index : 'total',
            align : "right",
            editable : true
            }, {
            name : 'note',
            index : 'note',
            sortable : false,
            editable : true
            }],
            rowNum : 10,
            rowList : [10, 20, 30],
            pager : '#pjqgrid',
            sortname : 'id',
            toolbarfilter : true,
            viewrecords : true,
            sortorder : "asc",
            gridComplete : function() {
            var ids = jQuery("#jqgrid").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
            var cl = ids[i];
            be = "<button class='btn btn-xs btn-default' data-original-title='Edit Row' onclick=\"jQuery('#jqgrid').editRow('" + cl + "');\"><i class='fa fa-pencil'></i></button>";
            se = "<button class='btn btn-xs btn-default' data-original-title='Save Row' onclick=\"jQuery('#jqgrid').saveRow('" + cl + "');\"><i class='fa fa-save'></i></button>";
            ca = "<button class='btn btn-xs btn-default' data-original-title='Cancel' onclick=\"jQuery('#jqgrid').restoreRow('" + cl + "');\"><i class='fa fa-times'></i></button>";
            //ce = "<button class='btn btn-xs btn-default' onclick=\"jQuery('#jqgrid').restoreRow('"+cl+"');\"><i class='fa fa-times'></i></button>";
            //jQuery("#jqgrid").jqGrid('setRowData',ids[i],{act:be+se+ce});
            jQuery("#jqgrid").jqGrid('setRowData', ids[i], {
            act : be + se + ca
            });
            }
            },
            editurl : "dummy.html",
            caption : "Employee Time Sheets",
            multiselect : true,
            autowidth : true,

            });
            jQuery("#jqgrid").jqGrid('navGrid', "#pjqgrid", {
            edit : false,
            add : false,
            del : true
            });
            jQuery("#jqgrid").jqGrid('inlineNav', "#pjqgrid");
            /* Add tooltips */
            $('.navtable .ui-pg-button').tooltip({
            container : 'body'
            });

            jQuery("#m1").click(function() {
            var s;
            s = jQuery("#jqgrid").jqGrid('getGridParam', 'selarrrow');
            alert(s);
            });
            jQuery("#m1s").click(function() {
            jQuery("#jqgrid").jqGrid('setSelection', "13");
            });

            // remove classes
            $(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
            $(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
            $(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
            $(".ui-jqgrid-pager").removeClass("ui-state-default");
            $(".ui-jqgrid").removeClass("ui-widget-content");

            // add classes
            $(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
            $(".ui-jqgrid-btable").addClass("table table-bordered table-striped");

            $(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");
            $(".ui-icon.ui-icon-plus").removeClass().addClass("fa fa-plus");
            $(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
            $(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
            $(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
            $(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
            $(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
            $(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");

            $(".ui-icon.ui-icon-seek-prev").wrap("<div class='btn btn-sm btn-default'></div>");
            $(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");

            $(".ui-icon.ui-icon-seek-first").wrap("<div class='btn btn-sm btn-default'></div>");
            $(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");

            $(".ui-icon.ui-icon-seek-next").wrap("<div class='btn btn-sm btn-default'></div>");
            $(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");

            $(".ui-icon.ui-icon-seek-end").wrap("<div class='btn btn-sm btn-default'></div>");
            $(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");

            })

            $(window).on('resize.jqGrid', function() {
            $("#jqgrid").jqGrid('setGridWidth', $("#content").width());
            })

    </script>



@endsection
