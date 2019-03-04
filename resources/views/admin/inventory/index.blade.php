
@extends('layouts.app')

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


                        <div class="x_title">

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="response"></div>

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Plants Items</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" data-delform ="chemical-items" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Chemicals Items</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" data-delform ="tools-items" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Tools Items</a>

                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content4" data-delform ="accessories-items" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Accessories Items</a>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                        <div class="page-title">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12 " style="text-align: center">
                                                    <h1>Plant Items </h1>

                                                </div>

                                            </div>
                                        </div>


                                        <form id ="plants-newitems-create" class="form-horizontal form-label-left">
                                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Plants')}}">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select class="form-control" id="branch" name="branch"  required>
                                                        <option value="" >--select Branch--</option>
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->branch}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select class="form-control" id="sub_category-select" name="sub_category" required>
                                                        <option value="" >--select Sub category--</option>
                                                        @foreach($plantsCategory as $category)
                                                            <option value="{{$category->id}}">{{$category->category }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id ="plant-filters"></div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit"  class="btn btn-primary" id="find-in-btn">Find Your Inventory</button>
                                                    <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Your Item to be modified <small>Here is the item that you filtered</small></h2>
                                                        <ul class="nav navbar-right panel_toolbox">
                                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                            </li>


                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div id ="feched-inventory">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <div class="page-title">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12 " style="text-align: center">
                                                    <h1>Chemical Items </h1>

                                                </div>

                                            </div>
                                        </div>
                                        <form id ="chemical-newitems-create" class="form-horizontal form-label-left">
                                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Chemicals')}}">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select class="form-control" id="branch" name="branch"  required>
                                                        <option value="" >--select Branch--</option>
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->branch}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub category</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select class="form-control" id="sub_category-select-chemical" name="sub_category"  required>
                                                        <option value="" >--select Branch--</option>
                                                        @foreach($chemicalCategory as $subcategory)
                                                            <option value="{{$subcategory->id}}">{{$subcategory->category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id ="chemical-filters"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit"  class="btn btn-primary" id="find-in-btn">Find Your Inventory</button>
                                                    <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Your Item to be modified <small>Here is the item that you filtered</small></h2>
                                                        <ul class="nav navbar-right panel_toolbox">
                                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                            </li>


                                                        </ul>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div id ="feched-chemical-inventory">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">



                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 " style="text-align: center">
                                                        <h1>Tools Items </h1>

                                                    </div>

                                                </div>
                                            </div>
                                            <form id ="tools-newitems-create" class="form-horizontal form-label-left">
                                                <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Tools')}}">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" id="branch" name="branch"  required>
                                                            <option value="" >--select Branch--</option>
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->branch}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub category</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" id="sub_category-select-tool" name="sub_category"  required>
                                                            <option value="" >--select Branch--</option>
                                                            @foreach($toolsCategory as $subcategory)
                                                                <option value="{{$subcategory->id}}">{{$subcategory->category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id ="tool-filters"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit"  class="btn btn-primary" id="find-in-btn">Find Your Inventory</button>
                                                        <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Your Item to be modified <small>Here is the item that you filtered</small></h2>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                </li>


                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div id ="feched-tools-inventory">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                        <div class="page-title">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12 " style="text-align: center">
                                                    <h1>Accessories Items </h1>

                                                </div>

                                            </div>
                                        </div>
                                        <form id ="accessories-newitems-create" class="form-horizontal form-label-left">
                                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Accessories')}}">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select class="form-control" id="branch" name="branch"  required>
                                                        <option value="" >--select Branch--</option>
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->branch}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <select class="form-control" id="sub_category-select-accessories" name="sub_category" required>
                                                        <option value="" >--select Sub category--</option>
                                                        @foreach($accessoriesCategory as $category)
                                                            <option value="{{$category->id}}">{{$category->category }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id ="accessories-filters"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit"  class="btn btn-primary" id="find-in-btn">Find Your Inventory</button>
                                                    <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div id ="feched-accessories-inventory">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection