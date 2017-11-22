@extends('layouts.defaultlayout')

@section('header')
    <title>{{ $article->title }} - {{ postTitle() }}</title>
@endsection

@section('content')
    <main id="main" class="main">
        <div class="main-inner">
            <div class="content-wrap">
                <div id="content" class="content">
                    <div id="posts" class="posts-expand">
                        <article class="post post-type-normal " itemscope itemtype="http://schema.org/Article">
                            <header class="post-header">
                                <h1 class="post-title" itemprop="name headline">
                                    {{ $article->title }}
                                </h1>
                                <div class="post-meta">
                                    <span class="post-time">
                                        <span class="post-meta-item-icon"><i class="fa fa-calendar-o"></i></span>
                                        <span class="post-meta-item-text">发表于</span>
                                        <time itemprop="dateCreated">
                                          {{ $article->created_at->format('Y-m-d') }}
                                        </time>
                                    </span>
                                    <span class="post-category" >
                                        &nbsp; | &nbsp;
                                        <span class="post-meta-item-icon">
                                            <i class="fa fa-folder-o"></i>
                                        </span>
                                        <span class="post-meta-item-text">分类于</span>
                                        <span itemprop="about" itemscope itemtype="https://schema.org/Thing">
                                            <a href="#" itemprop="url" rel="index">
                                                <span itemprop="name">Default</span>
                                            </a>
                                        </span>
                                    </span>
                                </div>
                            </header>
                            <div class="post-body" itemprop="articleBody">
                                <?php echo convertMarkdownToHtml($article->content); ?>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br/>
@endsection