@extends('layouts.app')

@section('content')
    @foreach($errors->all() as $error)
        {{ $error  }}
    @endforeach
<div class="container">
    <div class='row'>
        <div class='col-sm-12'>
            {{ Session::get('message') !== null ? Session::get('message') : '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 my-5">
            <form role="form" action="{{ route('register') }}"  method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text"
                           class="form-control"
                           name="username"
                           placeholder="username" required>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="required-field">Password</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="password" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           aria-describedby="emailInfo"
                           placeholder="john@example.com">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
