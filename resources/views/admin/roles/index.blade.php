@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 float-leftt">
                    <h3>Manage User Role</h3>

                </div>
                <div class="col-md-3  col-sm-3 col-xs-12 " >
                    <div class="">
                        <a type="button" href="{{route('roleCreate')}}" class="btn btn-info btn-lg">Add New Role</a>
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
                                <th>Role</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($roleList) && $roleList != false):
                            $c = 0;
                            foreach ($roleList as $item):
                            $c++;
                            ?>

                            <tr>
                                <td>
                                    <?= $c ?>
                                </td>
                                <td>
                                    <?= $item->role ?>
                                </td>
                                <td width="20%" class="text-right">

                                    <a type="button" id ="edit_role"  href="{{url('roles/edit/'.$item->id)}}" class="btn btn-round btn-primary" value="{{$item->id}}">edit</a>
                                    <a type="button" id ="delete_role" data-delform ="<?php echo "del-form-".$c?>" class="btn btn-round btn-danger del-role-btn" >Delete</a>
                                    <form id ="<?php echo "del-form-".$c?>" name ="role_show">
                                        <input name="method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="role_id" value="{{$item->id}}">
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