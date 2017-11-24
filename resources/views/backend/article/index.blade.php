@extends('layouts.backend')

@section('content')
    <div class="page-heading">
        <h3>文章管理</h3>
        <ul class="breadcrumb">
            <li><a href="/backend/index">后台首页</a></li>
            <li class="active">文章管理</li>
        </ul>
    </div>

    <div style="margin:10px;border: 0px solid #ccc;background-color: #fff;padding:10px;">
        <a href="{{ URL::route('article.create') }}"><button class="btn btn-success">写文章</button></a>
    </div>

    <div style="margin:10px;border: 0px solid #ccc;background-color: #fff;">
        <table class="table backendtable">
            <tbody>
                <thread>
                    <td>ID</td>
                    <td>标题</td>
                    <td>操作</td>
                </thread>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td style="line-height: 34px;">{{ $article->title }}</td>
                        <td>
                        {!! createEditFrom("/backend/article/" .  $article->id . "/edit") !!}{!! createSpace() !!}
                            {!! createDeleteFrom("/backend/article/" .  $article->id,'删除') !!}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $articles->links() !!}
@endsection