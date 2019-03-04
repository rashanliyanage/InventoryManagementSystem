
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
                        <form id ="user-create" class="form-horizontal form-label-left">
                            <input type="hidden" id ="_token" value="{{ csrf_token() }}">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Usre Role</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="" >--select Role--</option>
                                        @foreach($userRoles as $role)
                                            <option value="{{$role->id}}">{{$role->role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <select class="form-control" id="branch" name="branch" required>
                                        <option value="" >--select Role--</option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->branch}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                            <div class="col-md-4 col-sm4 col-xs-12">
                                <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="2">Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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