<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?> </script>

    <link href="{{ url('assets/backend/images/favicon.png') }}" rel="shortcut icon" />
    <link href="{{ url('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ url('assets/backend/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
@if (session()->has('token_error'))
    <div class="top-fixed-msg text-center error">{{ session('token_error') }} <a href="javascript:void()" onclick="location.reload();">Reload</a></div>
@endif
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form class="form-horizontal" method="POST" action="{{route('login')}}">
                    {!! csrf_field() !!}

                  <h1 style="font-size: 30px;">Dherana International</h1>

                    <h2>Login Form</h2>
                    <p>Enter your email address &amp; password to login.</p>
                    <br>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
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

                    <p><a href="{{ url('/admin/password/forgot') }}">Forgot password?</a></p><br>

                    <button type="submit" class="btn btn-primary btn-block submit">Login</button>


                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <p>Copyright © {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
                        </div>
                    </div>

                </form>
            </section>
        </div>
    </div>

</div>
</body>

</html>