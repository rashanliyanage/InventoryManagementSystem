
@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 float-leftt">
                    <h3>Add User </h3>

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
                        <form id ="item-edit-form" class="form-horizontal form-label-left">
                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id ="item_id" name="item_id" value="{{ $item->id }}">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Main Category</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" id="main_category-select-for-edt" name="main_category" required>
                                        <option value="" >--select Category--</option>
                                        @foreach($mainCategory as $mainitem)
                                            <?php
                                               $mainCategory =\App\SubCategory::find($item->sub_category_id)->maincategory->id;

                                            ?>

                                            <option  <?php  echo $mainCategory ==$mainitem->id?'selected':''?> value="{{$mainitem->id}}">{{$mainitem->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id ="sub-category">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Main Category</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select class="form-control" id="sub_category" name="sub_category" required>
                                            <option value="" >--select Category--</option>
                                            @foreach($subCategory as $subItem)
                                                <?php
                                                $mainCategory =\App\SubCategory::find($item->sub_category_id)->maincategory->id;

                                                ?>
                                                @if($subItem->mainCategoryId== $mainCategory)
                                                <option  <?php  echo $item->sub_category_id ==$subItem->id?'selected':''?> value="{{$subItem->id}}">{{$subItem->category}}</option>
                                                @endif
                                                    @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" id="common_name" name="common_name" value="{{$item->name}}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Botanical Name </label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" id="bot_name" name="bot_name" value="{{$item->bot_name}}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Order Level</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" id="min_order_level" name="min_order_level"  value="{{$item->min_order_level}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                <div class="col-md-4 col-sm4 col-xs-12">
                                    <input type="file"   onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])" id="plants-items-file" name="item_image"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-4 col-sm4 col-xs-12">

                                    <img src="{{URL::asset($item->img_path)}}" id="blah1"  width="300" height="200" />
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" id ="" name =""class="btn btn-primary">Submit</button>
                                    <button class="btn btn-default" type="reset" id="resetBtn">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection