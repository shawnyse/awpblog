<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top has-navbar-fixed-bottom">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        @yield ('page_title', 'MovieComments')
    </title>
    <meta name="description" content="movie comment page">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ( 'css/movieComment.css' )}}" />
    <link rel="icon" type="image/png" href="{{ asset ('images/film.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
{{--login system--}}
    <nav class="navbar is-size-4-tablet is-white is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/comment">
                <i class="fa fa-home"></i>&nbspHome
            </a>
        </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        @guest
                        <a class="button is-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="button is-primary" href="{{ route('register') }}"><strong>{{ __('Register') }}</strong></a>
                            @endif
                        @else
                            <a class="button is-white">
                                {{ Auth::user()->name }}
                            </a>
                                    <div class="button is-white">
                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                    </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                    </div>
                </div>
            </div>
    </nav>

<div class="container">
    <h1 class="title" style="margin-top: 30px; color:black; font-size:50px; font-weight: bold">
        @yield ('page_heading', 'MovieComments')
    </h1>
    @yield ('content')
</div>

</body>
</html>
