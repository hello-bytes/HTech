@extends('layouts.backend')

@section('content')
    <div class="page-heading">
        <h3>标签管理</h3>
        <ul class="breadcrumb">
            <li><a href="/backend/index">后台首页</a></li>
            <li class="active">标签管理</li>
        </ul>
    </div>

    <div style="margin:10px;border: 0px solid #ccc;background-color: #fff;padding:10px;">
        <a href="{{ URL::route('tag.create') }}"><button class="btn btn-success">创建标签</button></a>
    </div>

    <div style="padding: 10px;">
        <table class="table backendtable">
            <tbody>
            <thread>
                <td width="5%">ID</td>
                <td>标题</td>
                <td width="20%">操作</td>
            </thread>
            @foreach ($tags as $tag)
                <tr>
                    <td style="line-height: 34px;">{{ $tag->id }}</td>
                    <td style="line-height: 34px;">{{ $tag->name }}</td>
                    <td>
                    {!! createEditFrom("/backend/tag/" .  $tag->id . "/edit") !!}{!! createSpace() !!}
                    {!! createDeleteFrom("/backend/tag/" .  $tag->id,'删除') !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $tags->links() !!}
@endsection