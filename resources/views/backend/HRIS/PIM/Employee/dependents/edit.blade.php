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
                        <h2> Assigned Dependents </h2>
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
                            <form id="frmDependents" method="POST" enctype="multipart/form-data" action="{{url('administration/view-dependents/'.$d->id.'/edit')}}" class="smart-form">
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="label"> Name</label>
                                            <label class="input">
                                                <input value="{{$d->ed_name}}" type="text" name="name" id="name">
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="label">Relationship</label>
                                            @php
                                                $r = \App\Relationship::all();
                                            @endphp
                                            <label class="select state-success">
                                                <select name="relationship_id" id="relationship_id" class="valid">
                                                    <option value=""> -- Relationship --</option>
                                                    @foreach($r as $rs)
                                                        <option value="{{$rs->id}}"  {{ $rs->id == $d->relationship_id ? 'selected="selected"' : '' }}>{{$rs->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                    </div>
                                    <section>
                                        <label class="label"> Date Of Birth </label>
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input value="{{$d->ed_date_of_birth}}" type="text" id="from_date" name="date_of_birth" class="datepicker_from">
                                        </label>
                                    </section>

                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">Save</button>
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

        $('.datepicker_from').datepicker();
        var $loginForm = $("#frmDependents").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
                relationship_id: {
                    required: true
                },
                date_of_birth : {
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