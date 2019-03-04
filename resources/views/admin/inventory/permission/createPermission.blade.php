@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form-horizontal" method="POST" action="{{route('submitPermission')}}">
                        {!! csrf_field() !!}

                        <h1 style="font-size: 25px;">Request Permission To <br> Update Inventory</h1>

                        <h2>Request Permission Form</h2>
                        <p>Enter your reason</p>


                        <div class="form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
                            <textarea id="reason" rows="3" type="text" class="form-control" name="reason"  placeholder="Please give the reason"  ></textarea>

                            @if ($errors->has('reason'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reason') }}</strong>
                                </span>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary btn-block submit">Submit Request Permission </button>


                        <div class="clearfix"></div>
                        <p><a href="{{ url('/inventoryLogin') }}">Logging for update Inventory</a></p><br>


                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection