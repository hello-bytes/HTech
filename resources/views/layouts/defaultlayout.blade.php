<!DOCTYPE html>
<html lang="zh-cmn-Hans" prefix="og: http://ogp.me/ns#" class="han-init">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

        @yield('header')

        <meta property="og:type" content="article">
        <meta property="og:locale" content="zh_CN" />

        <link rel="stylesheet" href="{{ publishAsset('/vendor/fancybox/source/jquery.fancybox.css') }}">
        <link rel="stylesheet" href="{{ publishAsset('/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ publishAsset('/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ publishAsset('/css/beauty/index.css') }}">


        <meta property="og:type" content="article">
        <meta property="og:locale" content="zh_CN" />
    </head>
    <body class="home">
        <header id="header" class="header">
            <div class="header-inner">
                <div class="site-meta ">
                    <div class="custom-logo-site-title">
                        <a href="/" class="brand" rel="start">
                            <span class="logo-line-before"><i></i></span>
                            <span class="site-title">Hello - Tech</span>
                            <span class="logo-line-after"><i></i></span>
                        </a>
                    </div>
                    <p class="site-subtitle"></p>
                </div>

                <div class="site-nav-toggle">
                    <button>
                        <span class="btn-bar"></span>
                        <span class="btn-bar"></span>
                        <span class="btn-bar"></span>
                    </button>
                </div>
                <nav class="site-nav">
                    <ul id="menu" class="menu menu-left">
                        <li class="menu-item menu-item-home">
                            <a href="/" rel="section">
                                <i class="menu-item-icon fa fa-home fa-fw"></i> <br />
                                首页
                            </a>
                        </li>
                        <li class="menu-item menu-item-about">
                            <a href="/about" rel="section">
                                <i class="menu-item-icon fa fa-user fa-fw"></i> <br />
                                关于
                            </a>
                        </li>
                    </ul>

                    <div class="site-search">
                        <form class="site-search-form" method="get" action="/search">
                            <input type="text" id="st-search-input" class="st-search-input st-default-search-input" />
                        </form>
                    </div>

                </nav>

            </div>
        </header>

        @yield('content')

        <div style="border-top: 1px solid #ccc;text-align: center">
            {{ beian() }}
        </div>

        <script src="{{ globalAsset("/bootstrap/js/jquery.min_v1_11_3.js") }}"></script>
        <script src="{{ globalAsset("/bootstrap/js/bootstrap.min.js")  }}"></script>

        @include('layouts.footer')


    </body>

</html>
