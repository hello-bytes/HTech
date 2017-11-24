<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/fav.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ postTitle() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link href="/backend/css/style.css?v=1.0.1025" rel="stylesheet">
    <link href="/backend/css/style-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('/backend/plugin/jquery-1.9.1.js') }}"></script>

</head>
<?php
function smartGroupActive($controller){
    $controller = "App\\Http\\Controllers\\backend\\" . $controller;
    if(strcmp(currentController(),$controller) == 0){
        echo "nav-active";
    }
}

function smartNavigateActive($controller,$action){
    $controller = "App\\Http\\Controllers\\backend\\" . $controller;
    if(strlen($action) > 0){
        if(strcmp(currentAction(),$action) == 0 && strcmp(currentController(),$controller) == 0){
            echo "active";
        }
    }else{
        if(strcmp(currentController(),$controller) == 0){
            echo "active";
        }
    }

}
?>
<body>
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">
        <!--logo and iconic logo start-->
        <div class="logo" style="padding-bottom:10px;padding-top:10px;height: 60px;">
            <a href="/"><img src="/backend/images/logo.png" alt="" width="200px"></a>
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav" style="margin-top: 0px;padding-top: 0px;">
                <li class="<?php smartNavigateActive("BackendController","") ?>"><a href="/backend/index"><i class="fa fa-home"></i> <span>系统概况</span></a></li>
                <li class="<?php smartNavigateActive("UserController","") ?>"><a href="/backend/user"><i class="fa fa-user"></i> <span>用户管理</span></a></li>
                <li class="menu-list <?php smartGroupActive("ArticleController") ?> <?php smartNavigateActive("CategoryController","") ?> <?php smartNavigateActive("TagController","") ?>"><a href=""><i class="fa fa-laptop"></i><span>内容管理</span></a>
                    <ul class="sub-menu-list">
                        <li class="<?php smartNavigateActive("ArticleController","") ?>"><a href="/backend/article">文章管理</a></li>
                        <li class="<?php smartNavigateActive("CategoryController","") ?>"><a href="/backend/category">分类管理</a></li>
                        <li class="<?php smartNavigateActive("TagController","") ?>"><a href="/backend/tag">标签管理</a></li>
                    </ul>
                </li>
                <li class="menu-list <?php smartGroupActive("SystemSettingController") ?>"><a href=""><i class="fa fa-bolt"></i><span>系统设置</span></a>
                    <ul class="sub-menu-list">
                        <li class="<?php smartNavigateActive("SystemSettingController","") ?>"><a href="/backend/setting">基本设置</a></li>
                    </ul>
                </li>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" style="position: absolute;overflow-y: scroll;top:0px;bottom:51px;left:0px;right: 0px;" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li style="height: 50px;">
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height: 50px;">
                            <?php echo Auth::user()->name; ?><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li style="height: 32px;"><a href="/resetmypassword" ><i class="fa fa-user"></i>修改密码</a></li>
                            <li style="height: 32px;"><a href="/logoutit"><i class="fa fa-sign-out"></i>登出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->
        </div>
        <!-- header section end-->

        <!-- page heading start-->
    @yield('content')
    <!-- page heading end-->


        <!--footer section start-->
        <footer style="position: fixed;bottom: 0px;left:240px;right:0px;">
            <span style="float: left;margin:0px;padding:0px;">2017 &copy; HelloTech</span>
        </footer>
        <!--footer section end-->
    </div>
    <!-- main content end-->
</section>

<!-- Scripts
<script src="{{ asset('js/app.js') }}"></script>
-->

<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/jquery-1.10.2.min.js"></script>
<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/jquery-migrate-1.2.1.min.js"></script>

<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/flot-chart/jquery.flot.js"></script>
<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/flot-chart/jquery.flot.resize.js"></script>

<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/chart-js/Chart.js"></script>



<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/bootstrap.min.js"></script>
<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/modernizr.min.js"></script>
<script src="https://oss-cn-hangzhou.aliyuncs.com/codingsky/cdn/uranus/js/scripts.js?v=1.0.1003"></script>

@yield('footer')
@yield('javascript')
</body>
</html>
