@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main" style="min-height: 100vh;">
        <div class="page-title">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 float-leftt">
                    <h3>Add New Sub Categoty</h3>

                </div>
                <div class="col-md-3  col-sm-3 col-xs-12 " >
                    <div class="">
                        <a type="button" href="{{route('subCategory')}}" class="btn btn-info btn-lg" style="font-size: 15px;">Manage Category</a>
                    </div>
                </div>
            </div>
            {{--<div class="col-xs-12 title_left">--}}
            {{--<h3>Add User Role</h3>--}}
            {{--</div>--}}
            {{--<div class="col-xs-12 title_right">--}}
            {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
            {{--<button type="button" class="btn btn-info btn-lg">Manage  Role</button>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="clearfix "></div>
        <div class="row ">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <br />

                        <div id="response"></div>
                        <form id="sub-category-create" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Main Category</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" id="main_category_id" name="main_category_id" required>
                                        <option value="" >--select Category--</option>
                                        @foreach($mainCategoryInfo as $category)
                                            <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sub Category Name  <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="category" name="category" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" id="roleCreateSubmit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection