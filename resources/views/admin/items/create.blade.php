
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


                                            <form id ="plants-inventory-create" class="form-horizontal form-label-left">
                                                <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Plants')}}">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Common Name</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="common_name" name="common_name" required class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Botanical Name</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="bot_name" name="bot_name" required class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" id="sub_category" name="sub_category" required>
                                                            <option value="" >--select Role--</option>
                                                            @foreach($plantsCategory as $item)
                                                                <option value="{{$item->id}}">{{$item->category}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Order Level</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="text" id="min-order-level" name="min_order_level" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="file"  onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])" id="plants-items-file" name="item_image" required="required" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <img id="blah1"  width="300" height="200" />
                                                    </div>
                                                </div>



                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit" data-delform ="plants-items" id="submit-new-item" class="btn btn-primary create-items">Submit</button>
                                                        <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 " style="text-align: center">
                                                        <h1>Chemical Items </h1>

                                                    </div>

                                                </div>
                                            </div>
                                            <form id ="chemical-items" class="form-horizontal form-label-left">
                                                <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Chemicals')}}">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Common Name</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="common_name" name="common_name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Botanical Name</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="bot_name" name="bot_name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" id="sub_category" name="sub_category" required>
                                                            <option value="" >--select Role--</option>
                                                            @foreach($chemicalCategory as $item)
                                                                <option value="{{$item->id}}">{{$item->category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Order Level</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="text" id="min-order-level" name="min_order_level" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="file"  onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])" id="plants-items-file" name="item_image" required="required" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <img id="blah2"  width="300" height="200" />
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit"  data-delform ="chemical-items"  id="submit-new-item" class="btn btn-primary create-items">Submit</button>
                                                        <button class="btn btn-default " type="reset" id="resetBtn">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 float-leftt" style="text-align: center">
                                                        <h1>Tools Items </h1>

                                                    </div>

                                                </div>
                                            </div>

                                            <form id ="tools-items" class="form-horizontal form-label-left">
                                                <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Tools')}}">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Commen Name</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="common_name" name="common_name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" id="sub_category" name="sub_category" required>
                                                            <option value="" >--select Role--</option>
                                                            @foreach($toolsCategory as $item)
                                                                <option value="{{$item->id}}">{{$item->category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Order Level</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="text" id="min_order_level" name="min_order_level" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="file"  onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])" id="plants-items-file" name="item_image" required="required" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <img id="blah3"  width="300" height="200" />
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit" data-delform ="tools-items" id="submit-new-item"  class="btn btn-primary create-items">Submit</button>
                                                        <button class="btn btn-default" type="reset" id="resetBtn">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-md-9 col-sm-9 col-xs-12 " style="text-align: center">
                                                        <h1>Accessories Items </h1>

                                                    </div>

                                                </div>
                                            </div>
                                            <form id ="accessories-items" class="form-horizontal form-label-left">
                                                <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" id ="main_category_type" name="main_category_type" value="{{config('constant.mainCategory.Accessories')}}">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Commen Name</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="common_name" name="common_name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub Category</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <select class="form-control" id="sub_category" name="sub_category" required>
                                                            <option value="" >--select Role--</option>
                                                            @foreach($accessoriesCategory as $item)
                                                                <option value="{{$item->id}}">{{$item->category}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Order Level</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="text" id="min_order_level  " name="min_order_level" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <input type="file"  onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])" id="plants-items-file" name="item_image" required="required" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                    <div class="col-md-4 col-sm4 col-xs-12">
                                                        <img id="blah4"  width="300" height="200" />
                                                    </div>
                                                </div>
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit"  data-delform ="accessories-items" id="submit-new-item"  class="btn btn-primary create-items">Submit</button>
                                                        <button class="btn btn-default" type="reset" id="resetBtn">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
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