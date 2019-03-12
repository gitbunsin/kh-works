@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
    {{--<link href="{{asset('/css/treeview.css')}}" rel="stylesheet">--}}
    <section id="widget-grid" class="">

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-blue" id="wid-id-1" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
                        <h2>Organization Structure</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->
                        </div>
                        <!-- end widget edit box -->
                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="tree smart-form">
                                <ul>
                                    <li>
                                        <span><i class="fa fa-lg fa-folder-open"></i> Parent</span>
                                        <ul>
                                            <li>
                                                <span><i class="fa fa-lg fa-plus-circle"></i> Administrators</span>
                                                <ul>
                                                    <li style="display:none">
																	<span> <label class="checkbox inline-block">
																			<input type="checkbox" name="checkbox-inline">
																			<i></i>Michael.Jackson</label> </span>
                                                    </li>
                                                    <li style="display:none">
																	<span> <label class="checkbox inline-block">
																			<input type="checkbox" checked="checked" name="checkbox-inline">
																			<i></i>Sunny.Ahmed</label> </span>
                                                    </li>
                                                    <li style="display:none">
																	<span> <label class="checkbox inline-block">
																			<input type="checkbox" checked="checked" name="checkbox-inline">
																			<i></i>Jackie.Chan</label> </span>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <span><i class="fa fa-lg fa-minus-circle"></i> Child</span>
                                                <ul>
                                                    <li>
                                                        <span><i class="icon-leaf"></i> Grand Child</span>
                                                    </li>
                                                    <li>
                                                        <span><i class="icon-leaf"></i> Grand Child</span>
                                                    </li>
                                                    <li>
                                                        <span><i class="fa fa-lg fa-plus-circle"></i> Grand Child</span>
                                                        <ul>
                                                            <li style="display:none">
                                                                <span><i class="fa fa-lg fa-plus-circle"></i> Great Grand Child</span>
                                                                <ul>
                                                                    <li style="display:none">
                                                                        <span><i class="icon-leaf"></i> Great great Grand Child</span>
                                                                    </li>
                                                                    <li style="display:none">
                                                                        <span><i class="icon-leaf"></i> Great great Grand Child</span>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li style="display:none">
                                                                <span><i class="icon-leaf"></i> Great Grand Child</span>
                                                            </li>
                                                            <li style="display:none">
                                                                <span><i class="icon-leaf"></i> Great Grand Child</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                </ul>
                                <footer>
                                    <input type="button" class="btn btn-primary" id="BtnSaveCompanyStructure" value="">
                                    <input type="hidden" id="product_id" name="product_id" value="0">
                                    <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal">Close</button>
                                </footer>
                            </div>
                            {{--<div class="row">--}}
                            {{--<div class="tree smart-form col col-6">--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<span><i class="fa fa-lg fa-folder-open"></i> Parent</span>--}}
                                        {{--<ul>--}}
                                            {{--@foreach($categories as $category)--}}
                                            {{--<li>--}}
                                                {{--<span><i class="fa fa-lg fa-plus-circle"></i>  {{ $category->title }}</span>--}}
                                                {{--<ul>--}}
                                                    {{--<li>--}}
                                                       {{--@if(count($category->childs))--}}
                                                            {{--@include('backend.HRIS.admin.Company.structure.manageChild',['childs' => $category->childs])--}}
                                                        {{--@endif--}}
                                                        {{--</label> </span>--}}

                                                    {{--</li>--}}

                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<section class="col-md-6">--}}
                                {{--<h3>Add New Category</h3>--}}

                                {{--<form id="frmCategory" action="{{url('/administration/view-company-structure')}}" method="post"  class="smart-form">--}}

                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                    {{--<fieldset>--}}
                                        {{--@if ($message = Session::get('success'))--}}
                                            {{--<div class="alert alert-success alert-block">--}}
                                                {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                                                {{--<strong>{{ $message }}</strong>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                        {{--<div  class="form-group input {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                                            {{--{!! Form::label('Title:') !!}--}}
                                            {{--{!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}--}}
                                            {{--<span class="text-danger">{{ $errors->first('title') }}</span>--}}
                                        {{--</div>--}}

                                        {{--<div class="form-group input {{ $errors->has('parent_id') ? 'has-error' : '' }}">--}}
                                            {{--{!! Form::label('Category:') !!}--}}
                                            {{--{!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}--}}
                                            {{--<span class="text-danger">{{ $errors->first('parent_id') }}--}}

                                                    {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group input">--}}
                                            {{--<button class="btn btn-success">Add New</button>--}}
                                        {{--</div>--}}

                                    {{--</fieldset>--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</form>--}}


                            {{--</section>--}}

                        {{--</div>--}}
                        <!-- end widget content -->
                        </div>
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- Widget ID (each widget will need unique ID)-->
            </article>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('/js/treeview.js')}}"></script>
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {
            $('#BtnSaveCompanyStructure').val('Edit');

            pageSetUp();
            // PAGE RELATED SCRIPTS

            $('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
            $('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function(e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(':visible')) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
                }
                e.stopPropagation();
            });

        })

    </script>

@endsection