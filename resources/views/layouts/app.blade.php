<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        @yield ('page_title', 'MovieComments')
    </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset ('images/film.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css" />
    <link rel="stylesheet" href="{{asset ( 'css/moviecomment.css' )}}" />
</head>
<body>

<div class="container">
    <h1 class="title" style="margin-top: 30px; color:white; font-size:50px; font-weight: bold">
        @yield ('page_heading', 'MovieComments')
    </h1>

    @yield ('content')

</div>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>
