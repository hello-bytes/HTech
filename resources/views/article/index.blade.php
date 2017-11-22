@extends('layouts.defaultlayout')

@section('header')
    <title>{{ postTitle() }}</title>
@endsection

@section('content')
    <!-- /.banner -->
    <main id="main" class="main">
        <div class="main-inner">
            <div class="content-wrap">
                <div id="content" class="content">
                    <section id="posts" class="posts-expand">
                        @if(!empty($articleList))
                            @foreach($articleList['data'] as $article)
                                <article class="post post-type-normal">
                                    <header class="post-header">
                                        <h1 class="post-title">
                                            <a class="post-title-link" href="/article/{{ $article->id }}.html">
                                                {{ $article->title }}
                                            </a>
                                        </h1>
                                        <div class="post-meta">
                                    <span class="post-time">
                                        <span class="post-meta-item-icon"><i class="fa fa-calendar-o"></i></span>
                                        <span class="post-meta-item-text">发表于</span>
                                        <time itemprop="dateCreated">
                                          {{ $article->updated_at }}
                                        </time>
                                    </span>
                                            <span class="post-comments-count">
                                    &nbsp; | &nbsp;
                                    <a href="/article/{{ $article->id }}.html#comments" itemprop="discussionUrl">
                                      <span class="post-comments-count ds-thread-count" data-thread-key="" itemprop="commentsCount">评论</span>
                                    </a>
                                  </span>
                                        </div>
                                    </header>
                                    <div class="post-body" itemprop="articleBody">
                                        <?php echo convertMarkdownToHtml(strCut($article->content,80)); ?>

                                    </div>
                                    <div class="post-more-link text-center">
                                        <a class="btn" href="/article/{{ $article->id }}.html" rel="contents">
                                            阅读全文 &raquo;
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                    </section>
                </div>
            </div>
        </div>
        <div class="pagination text-align">
            <nav>

            </nav>
        </div>
        <!-- /pagination -->
    </main>
    <!-- /section.content -->

@endsection