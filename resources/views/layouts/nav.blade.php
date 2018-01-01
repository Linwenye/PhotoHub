<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/" style="color: #9b8a30">PhotoHub</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/home" style="color: #67b168;">首页</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/{{ Auth::user()->id }}/friends" style="color: #67b168;">好友<span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/topics" style="color: #67b168;">摄影圈</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/search" style="color: #67b168;">发现</a>
                </li>
            </ul>

            {{--right side of bar--}}
            <ul class="navbar-nav" style="color: #67b168;">
                @guest
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/{{ Auth::user()->id }}/album">
                                <i class="fa fa-picture-o" aria-hidden="true"></i> 我的相册</a>
                            <a class="dropdown-item" href="/{{ Auth::user()->id }}/upload_show">
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i>上传照片</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>注销</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>