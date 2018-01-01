@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/common.css">
    <style>
        .black_overlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index: 1001;
            -moz-opacity: 0.8;
            opacity: .80;
            filter: alpha(opacity=88);
        }

        .white_content {
            display: none;
            position: absolute;
            top: 22.5%;
            left: 35%;
            width: 30%;
            height: 70%;
            padding: 20px;
            /*border: 10px solid orange;*/
            background-color: white;
            z-index: 1002;
            overflow: auto;
        }


    </style>
@endsection

@section('content')
    <br>
    {{--TODO 添加编辑按钮响应--}}
    <div class="container">
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-light" style="background: floralwhite"
                    onclick="document.getElementById('create_album').style.display='block';document.getElementById('fade').style.display='block'">
                <i class="fa fa-plus" aria-hidden="true"></i> 新建相册
            </button>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Second group">
            <button type="button" class="btn btn-light" style="background: floralwhite">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑
            </button>
        </div>
    </div>
    <div class="album text-muted" style="margin-top: 1.5em">
        <div class="container">
            <div class="row">
                <div id="portfoliolist">
                    @foreach ($albums as $index=>$album)

                        <div class="portfolio web" data-cat="web">
                            {{--<div class="portfolio-wrapper">--}}
                            <div class="portfolio-wrapper card">
                                <a href="/{{Auth::user()->id}}/album/{{$album->album_id}}"><img src="{{$album->cover_url}}"></a>
                                {{--<img src="/images/raein.jpg" alt=""/>--}}
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">
                                            @foreach($tags[$index] as $tag)
                                            #{{$tag->tag_name}}
                                            @endforeach
                                            </a>
                                        {{--<span class="text-category">Web design</span>--}}
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                            <p style="text-align: center">
                                <a class="text-title">{{$album->album_name}}--{{$album->created_at}}</a>
                            </p>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

        <div style="text-align:center;clear:both">
        </div>
    </div>

    <div id="fade" class="black_overlay"></div>

    @include('user.album_create')

@endsection

@section('script')
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/js/jquery.mixitup.min.js"></script>

    <script type="text/javascript">
        $(function () {

            var filterList = {

                init: function () {

                    // MixItUp plugin
                    $('#portfoliolist').mixitup({
                        targetSelector: '.portfolio',
                        filterSelector: '.filter',
                        effects: ['fade'],
                        easing: 'snap',
                        // call the hover effect
                        onMixEnd: filterList.hoverEffect()
                    });

                },

                hoverEffect: function () {

                    // Simple parallax effect
                    $('#portfoliolist .portfolio').hover(
                        function () {
                            $(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
                            $(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
                        },
                        function () {
                            $(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
                            $(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
                        }
                    );
                }
            };

            // Run the show!
            filterList.init();


        });
    </script>
@endsection