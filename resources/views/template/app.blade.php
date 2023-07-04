<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="container-fluid" style="padding-left: 0;">
    <div class="row">
        <div class="col-2" style="padding-right: 0;">
            {{ View::make('template.navbar') }}
        </div>
        <div class="col">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
