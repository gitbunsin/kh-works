
@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <button style="background: #333;" id="btn_add" name="btn_add" class="btn btn-default pull-right"><span style="color:white;">Add New Candidate</span></button>
                        </div>
                    </div>
                </div>
                <br/>
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>List all Candidate</h2>
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
                                    <th style="text-align: center;" data-hide="phone">Vacany</th>
                                    <th style="text-align: center;" data-class="expand">Candidate</th>
                                    <th style="text-align: center;" data-hide="date">Date-of-Application</th>
                                    <th style="text-align: center;" >Interview</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($candidate as $candidates)
                                    <tr style="text-align: center;" id="candidate_id{{$candidates->id}}">
                                        <td>{{$candidates->last_name}} {{$candidates->first_name}} </td>
                                        <td>{{$candidates->name}}</td>
                                        <td>{{$candidates->date_of_application}}</td>
                                        <td>
                                            <a data-id="{{$candidates->id}}" id="approved" href="#" style="text-decoration:none;" class="btn-detail response">
                                                <i class="glyphicon glyphicon-adjust "></i>
                                            </a>
                                            <a data-id="{{$candidates->id}}" id="declined" href="#" style="text-decoration:none;" class="btn-detail response">
                                                <i class="glyphicon glyphicon-remove-sign"  style="color:red;"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a data-id="{{$candidates->id}}" href="#" style="text-decoration:none;" class="btn-detail open_modal">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-id="{{$candidates->id}}" href="#" style="text-decoration:none;" class="delete-item">
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
        <input id="url" type="hidden" value="{{ \Request::url() }}">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                {{--<div class="modal-content">--}}
                <div class="modal-body">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2> Candidate</h2>
                            </header>
                            <!-- widget div-->
                            <div>
                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->
                                </div>
                                <!-- widget content -->
                                <div class="widget-body no-padding">
                                    <form id="frmProducts"  class="smart-form">
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">First Name</label>
                                                    <label class="input">
                                                        <input type="text" maxlength="20" name="first_name" id="first_name">
                                                    </label>
                                                </section >
                                                <section class="col col-4">
                                                    <label class="label">Middle Name</label>
                                                    <label class="input">
                                                        <input type="text" maxlength="20" name="middle_name" id="middle_name">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">last Name</label>
                                                    <label class="input">
                                                        <input type="text" maxlength="20" id="last_name" name="last_name">
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="label">Email</label>
                                                    <label class="input">
                                                        <input type="text" id="email" name="email">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Job Vacancy</label>
                                                    <label class="input">
                                                        <input type="text" list="list">
                                                        <datalist id="list">
                                                            <option value="Alexandra">Alexandra</option>
                                                            <option value="Alice">Alice</option>
                                                        </datalist>
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="label">Key Words</label>
                                                    <label class="input">
                                                        <input  name="keywords" id="keywords" placeholder="Enter comma separated words..." type="text" maxlength="10">
                                                    </label>
                                                </section>
                                            </div>
                                            <div class="row">
                                                <section class="col col-6">
                                                    <label class="label">Resume</label>
                                                    <div class="input input-file">
                                                        <span class="button"><input id="file2" type="file" name="cv_file_id" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text"  placeholder="Include some files" readonly="">
                                                    </div>
                                                    <div class="note">
                                                        <strong>Note:</strong> Accepts .docx, .doc, .odt, .pdf, .rtf, .txt up to 1MB
                                                    </div>
                                                </section>
                                                <section class="col col-6">
                                                    <label class="label"> Date </label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input type="text" id="date-of-application" name="date-of-application" placeholder="Request activation on" class="datepicker">
                                                    </label>
                                                </section>
                                            </div>

                                            <section>
                                                <label class="label">Comment</label>
                                                <label class="textarea">
                                                    <textarea name="comment" id="comment" rows="6" class="custom-scroll"></textarea>
                                                </label>
                                                <div class="note">
                                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                                </div>
                                            </section>
                                        </fieldset>
                                        <footer>
                                            <input type="button" class="btn btn-primary" id="btn-save" value="add">
                                            <input type="hidden" id="product_id" name="product_id" value="0">
                                            <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                        </footer>
                                    </form>
                                </div>
                                <!-- end widget content -->
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/JDMcKinstry/JavaScriptDateFormat/master/Date.format.min.js"></script>
    <script src="{{ asset('/js/hr/candidate.js') }}"></script>
@endsection