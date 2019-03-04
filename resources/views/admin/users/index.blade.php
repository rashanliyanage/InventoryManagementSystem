@extends('layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-12 float-leftt">
                    <h3>Manage User</h3>

                </div>
                <div class="col-md-3  col-sm-3 col-xs-12 " >
                    <div class="">
                        <a type="button" href="{{route('userCreate')}}" class="btn btn-info btn-lg">Add New User</a>
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
                       <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($usersList) && $usersList != false):
                            $c = 0;
                            foreach ($usersList as $item):
                            $c++;
                            ?>
                            <tr>
                                <td width="10%"><?= $c ?></td>
                                <td width="10%"><?= $item->role['role'] ?></td>
                                <td width="20%"><?= $item->name ?></td>
                                <td width="20%"><?= $item->email ?></td>
                                <td width="20%"><?= ($item->status==1)?'<span class="badge bg-green">Active</span>':'<span class="badge bg-red">Deactive</span>' ?></td>
                                <td width="20%" >
                                    <a type="button" id ="edit_role"  href="{{url('users/edit/'.$item->id)}}" class="btn btn-round btn-primary" value="{{$item->id}}">edit</a>
                                    <a type="button" id ="delete_user" data-delform ="<?php echo "del-form-".$c?>" class="btn btn-round btn-danger del-user-btn" >Delete</a>
                                    <form id ="<?php echo "del-form-".$c?>" name ="role_show">
                                        <input name="method" type="hidden" value="DELETE">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="user_id" value="{{$item->id}}">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td>0</td>
                                <td colspan="6">No Record Available</td>
                            </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection