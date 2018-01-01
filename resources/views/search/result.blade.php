@extends('search.search')
@section('result')
<div class="main-body" style="margin-top: 2em">
    <div class="wrap">
        <div class="col-md-10 content-left" style="padding-left: 10em;flex: 0 0 100%;max-width: 80%;">
            <div class="articles">
                <header>
                    <h3 class="title-head">搜索结果</h3>
                </header>

                @foreach($photo_posts as $photo_post)
                    <div class="article">
                        <div class="article-left">
                            <img src={{$photo_post->url}}>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>{{$photo_post->created_at}}<a class="span_link" href="#"><span
                                                class="glyphicon glyphicon-comment"></span></a><a class="span_link"
                                                                                                  href="#"><span
                                                class="glyphicon glyphicon-eye-open"></span></a><a class="span_link"
                                                                                                   href="#"><span
                                                class="glyphicon glyphicon-thumbs-up"></span></a></p>
                                <a class="title" href="/home">{{$photo_post->title}}</a>
                            </div>
                            <div class="article-text">
                                <p>{{$photo_post->description}}</p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection