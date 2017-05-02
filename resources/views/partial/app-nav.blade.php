<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">ثبت آوان</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                @can('add_order')
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">ثبت سفارش جدید
                        <span class="caret"></span></a>
                </li>
                @endcan
                @can('report_order')
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">گزارش سفارشات
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href=""></a></li>
                        <li><a href=""></a></li>
                    </ul>
                </li>
                @endcan
                </li>
                <li><a href="#about">درباره ما</a></li>
                <li><a href="#contact">تماس با ما</a></li>
            </ul>
            @if($loginUser=Auth::user())
                <div class="pull-left" style="margin: 10px;">
                @if($loginUser->hasRoles('Admin'))
                    <a style="padding: 5px;margin: 5px; color: #fff; background-color: #259d6d" href="{{route('dashboard')}}">
پنل مدیریت
                    </a>
                @endif
                    <a style="padding: 5px;margin: 5px; color: #fff; background-color: #8c0009" href="{{ url('/logout') }}">
                            خروج از سیستم
                    </a>
                </div>
            @else
                <div class="pull-left" style="margin: 10px;">
                    <a style="padding: 5px;margin: 5px; color: #fff; background-color: #005d2a" href="{{route('login')}}">
                            ورود به سایت
                    </a>
                    <a style="padding: 5px;margin: 5px; color: #fff; background-color: #004f94" href="{{route('signup')}}">
                            عضویت در سایت
                    </a>
                </div>
            @endif

        </div><!--/.nav-collapse -->
    </div>
</nav>