@extends('backend.HRIS.layouts.cms-layouts')
@section('content')
        @foreach($employee as $employees)
        <section id="widget-grid" class="">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <!-- product -->
                <div class="product-content product-wrap clearfix">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="product-image">
                                <img src="{{asset('/uploaded/EmpPhoto/')}}" alt="194x228" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-deatil">
                                <h5 class="name">
                                  Name :
                                    <a href="#">
                                       {{$employees->emp_firstname}} {{$employees->emp_lastname}}
                                    </a>
                                </h5>
                                <p class="price-container">
                                    Salary : <span>$399</span>
                                </p>
                            </div>
                            <div class="description">
                                <p class="price-container">
                                    Mobile : <span>{{$employees->emp_mobile}}</span>
                                </p><p class="price-container">
                                    Position : <span> Administration</span>
                                </p><p class="price-container">
                                    Department : <span> IT</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end product -->
            </div>
        </div>
        <!-- end row -->
    </section>
        @endforeach
        <div class="col-sm-12 text-center">
            <a href="javascript:void(0);" class="btn btn-primary btn-lg">Load more <i class="fa fa-arrow-down"></i></a>
        </div>
@endsection
@section('script')
    <script type="text/javascript"></script>
@endsection