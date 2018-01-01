@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/common.css">

@endsection

@section('content')
    <br>
    <div class="album text-muted" style="margin-top: 1.5em">
        <div class="container">
            <div class="row">
                <div id="portfoliolist">
                    @foreach ($photos as $index=>$photo)

                        <div class="portfolio web" data-cat="web">
                            <div class="portfolio-wrapper card">
                                <img src="{{$photo->url}}">
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">
                                            @foreach($tags[$index] as $tag)
                                                #{{$tag->tag_name}}
                                            @endforeach
                                        </a>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                            <p style="text-align: center">
                                <a class="text-title">{{$photo->title}}--{{$photo->created_at}}</a>
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