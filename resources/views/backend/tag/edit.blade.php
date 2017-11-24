@extends('layouts.backend')

@section('content')
    <div class="panel panel-default" style="margin: 20px;" xmlns="http://www.w3.org/1999/html">
        <div class="panel-heading">编辑标签</div>
        <div class="panel-body">
            <form method="POST" action="/backend/tag/{{ $tag->id }}" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name='_method' type='hidden' value='PUT'>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">名称:</label>
                    <div class="col-sm-7">
                        <input type="text" value="{{ $tag->name }}" id="name" class="form-control" name="name" />
                        <font color="red">{{ $errors->first('title') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">保存</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection