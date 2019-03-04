@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form class="form-horizontal" method="POST" action="{{route('login')}}">
                    {!! csrf_field() !!}

                    <h1 style="font-size: 25px;">Login For Update Inventory</h1>

                    <h2>Login Form</h2>
                    <p>Enter your permission id  &amp; password to login.</p>
                    <br>

                    <div class="form-group {{ $errors->has('permission_id') ? 'has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Permission Id" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('permission_id') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-block submit">Login</button>


                    <div class="clearfix"></div>
                    <p><a href="{{route('createNewPermission')}}">Request New Permission</a></p><br>


                </form>
            </section>
        </div>
    </div>
    </div>
@endsection