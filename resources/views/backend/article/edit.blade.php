@extends('layouts.backend')

@section('content')
    <link href="{{ asset('/backend/plugin/tags/css/bootstrap-tokenfield.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('/backend/plugin/tags/css/jquery-ui.css') }}" type="text/css" rel="stylesheet">

    <div class="panel panel-default" style="margin: 20px;">
        <div class="panel-heading">编辑文章</div>
        <div class="panel-body">
            <form method="POST" action="/backend/article/{{ $article->id }}" class="form-horizontal" enctype="multipart/form-data">
                <input name='_method' type='hidden' value='PUT'>
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标题:</label>
                    <div class="col-sm-7">
                        <input type="text" value="{{ $article->title }}" id="title" class="form-control" name="title" />
                        <font color="red">{{ $errors->first('title') }}</font>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">分类:</label>
                    <div class="col-sm-7">
                        <select id="category" name="category" class="form-control">
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标签:</label>
                    <div class="col-sm-7">
                        <input type="text" value="" id="tags" class="form-control" name="tags" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">摘要:</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="summary" name="summary" rows="4" placeholder="如果不填写,我们将为您自动生成。">{{ $article->summary }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">正文:</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="content" name="content" rows="20">{{ $article->content }}</textarea>
                        <font color="red">{{ $errors->first('content') }}</font>
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

@section('javascript')
    <script type="text/javascript" src="{{ asset('/backend/plugin/tags/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/backend/plugin/tags/bootstrap-tokenfield.js') }}" charset="UTF-8"></script>
    <script type="text/javascript">
        $('#tags').tokenfield({
            autocomplete: {
                source: <?php echo  \App\Model\Tag::getTagStringAll()?>,
                delay: 100
            },
            showAutocompleteOnFocus: !0,
            delimiter: [","]
        });
    </script>
@endsection