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
                        <h2> Project </h2>
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
                            <form id="frmProject" method="POST" enctype="multipart/form-data" action="{{url('administration/leave-type')}}" class="smart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="form-group">
                                        <label> Customer Name</label>
                                        @php $c = \App\Customer::all(); @endphp
                                        <select multiple style="width:100%" class="select2">
                                            <option value=""> -- Customer Name --</option>
                                            @foreach($c as $cs)
                                                <option value="{{$cs->id}}">{{$cs->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="note">
                                            <strong>Usage:</strong> &lt;select multiple style=&quot;width:100%&quot; class=&quot;select2&quot; &gt;...&lt;/select&gt;
                                        </div>
                                    </div>
                                    <section>
                                        <label class="label">Name</label>
                                        <label class="input">
                                            <input type="text" name="name" id="name">
                                        </label>
                                    </section>
                                    <div class="form-group">
                                        <label> Project Admin</label>
                                        @php $p = \employees::all(); @endphp
                                        <select multiple style="width:100%" class="select2">
                                            @foreach($p as $ps)
                                                <option value="{{$ps->emp_number}}">{{$ps->emp_lastname}}{{$ps->emp_firstname}}</option>
                                            @endforeach
                                        </select>
                                        <div class="note">
                                            <strong>Usage:</strong> &lt;select multiple style=&quot;width:100%&quot; class=&quot;select2&quot; &gt;...&lt;/select&gt;
                                        </div>
                                    </div>

                                    <section>
                                        <label class="label">description</label>
                                        <label class="textarea">
                                            <textarea rows="8" id="description" name="description" class="custom-scroll"></textarea>
                                        </label>
                                        <div class="note">
                                            <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                        </div>
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
        var $loginForm = $("#frmProject").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                },
            },
            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    </script>
@endsection