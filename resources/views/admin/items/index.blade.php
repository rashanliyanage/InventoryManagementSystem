
@extends('layouts.app')
@section('head')
    <link href="assets/backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/backend/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/backend/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/backend/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 float-leftt">
                    <h3>Add Items </h3>

                </div>
                <div class="col-md-3  col-sm-3 col-xs-12 " >
                    <div class="">
                        <a type="button" href="{{route('users')}}" class="btn btn-info btn-lg">Manage  User</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <div id="response"></div>

                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id ="manage-items" class="form-horizontal form-label-left">
                                <input type="hidden" id ="_token" value="{{ csrf_token() }}">

                                                              <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Main Category</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control" id="main_category-select" name="main_category" required>
                                            <option value="" >--select Category--</option>
                                            @foreach($mainCategory as $item)
                                                <option value="{{$item->id}}">{{$item->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group" id ="sub-category">

                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" data-delform ="plants-items" id="submit-new-item" class="btn btn-primary ">Submit</button>
                                        <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id ="fetching-data"></div>
    </div>
@endsection

@section('footer')


    <script src="{{url('assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('assets/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{url('assets/backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
@endsection