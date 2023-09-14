<!doctype html>
<html lang={{$_ENV['APP_LANG']}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$_ENV['APP_NAME']}}</title>
    <link rel="stylesheet" href="../../css/output.css">
</head>
<body>

<div class="w-full bg-gray-800">
    <div class="w-full max-w-5xl m-auto max-sm:px-5">
        @yield('content')
    </div>
</div>

</body>
</html>
