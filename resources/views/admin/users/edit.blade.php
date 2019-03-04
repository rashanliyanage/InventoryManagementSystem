
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
                        <form id ="user-edit-form" class="form-horizontal form-label-left">
                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id ="user_id" name="user_id" value="{{ $userInfo->id }}">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" id="name" name="name" value="{{$userInfo->name}}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" id="email" name="email" value="{{$userInfo->email}}" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Usre Role</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="" >--select Role--</option>
                                        @foreach($usersRoles as $role)
                                            <option <?php  echo ($userInfo->role_id == $role->id)?'selected':'';?> value="{{$role->id}}">{{$role->role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" id="branch" name="branch" required>
                                        <option value="" >--select Branch--</option>
                                        @foreach($branches as $branch)
                                            <option <?php  echo ($userInfo->branch_id == $branch->id)?'selected':'';?> value="{{$branch->id}}">{{$branch->branch}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                <div class="col-md-4 col-sm4 col-xs-12">
                                    <input type="password" id="password" name="password"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <select class="form-control" id="status" name="status">
                                        <option  <?php  echo ($userInfo->status == 1)?'selected':'';?> value="1">Active</option>
                                        <option <?php  echo ($userInfo->status == 0)?'selected':'';?> value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" id ="user-edit" name ="user-edit"class="btn btn-primary">Submit</button>
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