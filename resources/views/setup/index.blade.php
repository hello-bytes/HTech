@extends('layouts.blank')

@section('header')
    <title>设置您的博客</title>
@endsection

@section('content')
    <div style="text-align: center;">
        <h1>设置您的博客</h1>
    </div>
    <hr/>

    <div class="container">
        <div class="row">
            <div style="width: 800px;margin: 0px auto;">
                <form method="post" action="/dosetup" class="form-horizontal" >
                    {{ csrf_field() }}

                    <div>
                        <h2>管理员账号信息:</h2>
                        <hr/>
                    </div>

                    <div class="form-group">
                        <label for="account" class="col-sm-2 control-label">管理员账号:</label>
                        <div class="col-sm-6">
                            <input type="text" value="admin" id="account" class="form-control" name="account" />
                        </div>
                        <div class="col-sm-4">登录后台的账号,请牢记。</div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">管理员密码:</label>
                        <div class="col-sm-6">
                            <input type="text" value="htech-admin" id="password" class="form-control" name="password" />
                        </div>
                        <div class="col-sm-4">登录密码,请定期修改。</div>
                    </div>

                    <br/>
                    <h2>网站系统配置:</h2>
                    <hr/>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">网站标题:</label>
                        <div class="col-sm-6">
                            <input type="text" value="" id="title" class="form-control" name="title" />
                        </div>
                        <div class="col-sm-4">比如:Aaron的技术栈</div>
                    </div>

                    <div class="form-group">
                        <label for="domain" class="col-sm-2 control-label">网站地址:</label>
                        <div class="col-sm-6">
                            <input type="text" value="" id="domain" class="form-control" name="domain" />
                        </div>
                        <div class="col-sm-4">您的博客主页</div>
                    </div>

                    <div class="form-group">
                        <label for="beian" class="col-sm-2 control-label">备案信息:</label>
                        <div class="col-sm-6">
                            <input type="text" value="" id="beian" class="form-control" name="beian" />
                        </div>
                        <div class="col-sm-4">网站在工信部的备案</div>
                    </div>

                    <br/>
                    <div style="text-align: right">
                        <span>以上所有配置项,都可以在管理员后台进行管理。</span>
                    </div>

                    <hr/>
                    <div style="text-align: center">
                        <button type="summit" class="btn btn-success" style="height: 44px;font-size: 20px;padding:0px 50px;"/>初始化博客</button>
                    </div>
                    <br/><br/><br/>
                </form>
            </div>
        </div>
    </div>
@endsection