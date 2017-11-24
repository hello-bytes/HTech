@extends('layouts.backend')

@section('content')
    <div class="page-heading">
        <h3>分类管理</h3>
        <ul class="breadcrumb">
            <li><a href="/backend/index">后台首页</a></li>
            <li class="active">分类管理</li>
        </ul>
    </div>

    <div style="margin:10px;border: 0px solid #ccc;background-color: #fff;padding:10px;">
        <a href="{{ URL::route('category.create') }}"><button class="btn btn-success">创建分类</button></a>
    </div>

    <div style="padding: 10px;">
        <table class="table backendtable">
            <tbody>
            <thread>
                <td width="5%">ID</td>
                <td>标题</td>
                <td width="20%">操作</td>
            </thread>
            @foreach ($categories as $category)
                <tr>
                    <td style="line-height: 34px;">{{ $category->id }}</td>
                    <td style="line-height: 34px;">{{ $category->name }}</td>
                    <td>
                        {!! createEditFrom("/backend/category/" .  $category->id . "/edit") !!}{!! createSpace() !!}
                        {!! createDeleteFrom("/backend/category/" .  $category->id,'删除') !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {!! $categories->links() !!}

@endsection