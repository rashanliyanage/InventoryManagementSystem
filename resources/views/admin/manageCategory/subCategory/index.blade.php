@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 float-leftt">
                    <h3>Manage Sub Category</h3>

                </div>
                <div class="col-md-3  col-sm-3 col-xs-12 " >
                    <div class="">
                        <a type="button" href="{{route('subCategoryCreate')}}" class="btn btn-info btn-lg" style="font-size: 15px;">Add New Category</a>
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width:5%;">#</th>
                                <th>Sub Category</th>
                                <th>Main Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($subCategoryInfo) && $subCategoryInfo != false):
                            $c = 0;
                            foreach ($subCategoryInfo as $item):
                            $c++;
                            ?>

                            <tr>
                                <td>
                                    <?= $c ?>
                                </td>

                                <td>
                                    <?= $item->category ?>
                                </td>
                                <td>
                                    <?=  $item->maincategory->category ?>
                                </td>
                                <td width="20%" class="text-right">

                                    <a type="button" id ="edit_main_category"  href="{{url('subCategory/edit/'.$item->id)}}" class="btn btn-round btn-primary" value="{{$item->id}}">edit</a>
                                    <a type="button" id ="delete_main_category" data-delform ="<?php echo "del-form-".$c?>" class="btn btn-round btn-danger del-sub-category-btn" >Delete</a>
                                    <form id ="<?php echo "del-form-".$c?>" name ="category_show">
                                        <input name="method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="category_id" value="{{$item->id}}">
                                    </form>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td>0</td>
                                <td colspan="2">No Record Available</td>
                            </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection