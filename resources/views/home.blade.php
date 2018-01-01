@extends('layouts.layout')

@section('css')
    {{--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'--}}
          {{--rel='stylesheet' type='text/css'>--}}
    {{--<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>--}}
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

@endsection

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Animal</h1>
                    <p>Foxes are small-to-medium-sized, omnivorous mammals belonging to several genera of the family
                        Canidae. Foxes have a flattened skull, upright triangular ears, a pointed, slightly upturned
                        snout, and a long bushy tail (or brush).</p>
                </div>
                <img class="d-block w-100" src="/images/2.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Mountain</h1>
                    <p>Mountains loom large in the cultural imagination. They rise up and erupt in our minds as much as
                        they do on our landscapes.</p>
                </div>
                <img class="d-block w-100" src="/images/4.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Seaside</h1>
                    <p>Seaweed, steamy
                        piled high
                        on baked sand.

                        Fried flesh with
                        vacant smiles
                        attracting flies.</p>
                </div>
                <img class="d-block w-100" src="/images/6.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{--post--}}
    {{--@foreach()--}}
    <div class="main-body">
        <div class="wrap">
            <div class="col-md-10 content-left" style="padding-left: 10em;flex: 0 0 100%;max-width: 80%;">
                <div class="articles">
                    <header>
                        <h3 class="title-head">照片广场</h3>
                    </header>
                    <div class="article">
                        <div class="article-left">
                            <img src="/images/usr/419766878@qq.com/l3.jpg">
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On Apr 11, 2015 <a class="span_link" href="#"><span
                                                class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link"
                                                                                                    href="#"><span
                                                class="glyphicon glyphicon-eye-open"></span>54 </a><a class="span_link"
                                                                                                      href="#"><span
                                                class="glyphicon glyphicon-thumbs-up"></span>18</a></p>
                                <a class="title" href="/home">Contrary to popular belief, Lorem Ipsum is not
                                    simply random</a>
                            </div>
                            <div class="article-text">
                                <p>It is a long established fact that a reader will be distracted by the
                                    readable.....</p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>

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

    <footer class="text-muted" style="background: whitesmoke;height: 5em">
        <div class="container" style="padding-top:2em">
            <p class="float-right">
                <a href="#" style="color: grey">Back to top</a>
            </p>
            <p>Powered by Author 林文烨 -- 2017/12/10</p>
        </div>
    </footer>

@endsection
