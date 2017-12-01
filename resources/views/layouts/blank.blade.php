<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    @yield('header')

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ publishAsset('/vendor/fancybox/source/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ publishAsset('/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ publishAsset('/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ publishAsset('/css/beauty/index.css') }}">
</head>
<body class="home">

@yield('content')

<script src="{{ globalAsset("/bootstrap/js/jquery.min_v1_11_3.js") }}"></script>
<script src="{{ globalAsset("/bootstrap/js/bootstrap.min.js")  }}"></script>

@include('layouts.footer')


</body>

</html>
