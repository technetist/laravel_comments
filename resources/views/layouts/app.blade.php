<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment App</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="css/app.css">
    <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <a class="navbar-brand" href="./">Comments</a>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
            <li class="dropdown order-1">
                @if(!Auth::user())
                <button type="button"
                        id="dropdownMenu"
                        data-toggle="dropdown"
                        class="btn btn-outline-secondary dropdown-toggle">
                    Login <span class="caret"></span></button>
                <ul class="dropdown-menu dropdown-menu-right mt-2">
                    <li class="px-3 py-2">
                        <form role="form" class="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input id="username"
                                       name="email"
                                       placeholder="username"
                                       class="form-control form-control-sm"
                                       type="text" required>
                            </div>
                            <div class="form-group">
                                <input id="password"
                                       name="password"
                                       placeholder="password"
                                       class="form-control form-control-sm"
                                       type="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        name="login"
                                        class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <small><a href="register">New User?</a></small>
                            </div>
                            <div class="form-group text-center">
                                <small><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></small>
                            </div>
                        </form>
                    </li>
                </ul>
                @else
                <form role="form" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                            name="logout"
                            class="btn btn-outline-secondary">Logout</button>
                </form>
                @endif
            </li>
        </ul>
    </nav>

@yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.min.js"
            type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery("time.timeago").timeago();
        });
    </script>
</body>
</html>
