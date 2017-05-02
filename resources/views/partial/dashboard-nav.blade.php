<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/dashboard')}}">داشبورد ثبت آوان</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                @can('add_order')
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">مدیریت کاربران
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('users')}}">همه کاربران</a></li>
                        <li><a href="{{route('signup')}}">کاربر جدید </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> نقش ها
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('roles')}}">مدیریت نقش ها  </a></li>
                        <li><a href="{{route('roles.create')}}">ایجاد نقش </a></li>
                        <li><a href="{{route('roles.delete')}}">حذف نقش </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> دسترسی ها
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('permissions.create')}}">ایجاد دسترسی </a></li>
                        <li><a href="{{route('permissions.delete')}}">حذف دسترسی </a></li>
                    </ul>
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
            </ul>
            <div class="pull-left" style="margin: 10px;">
                <a style="padding: 5px;margin: 5px; color: #fff; background-color: #001963" href="{{route('home')}}">
                    مشاهده سایت
                </a>
                <a style="padding: 5px;margin: 5px; color: #fff; background-color: #8c0009" href="{{route('logout')}}">
                    خروج از سیستم
                </a>
            </div>
        </div><!--/.nav-collapse -->
    </div>
</nav>