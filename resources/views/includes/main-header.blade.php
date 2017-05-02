<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">مدیا</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">مدیاهمراه</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if (Storage::disk('local')->has($user->image))
                            <img src="{{ route('account.image', ['filename' => $user->image]) }}" alt="" class="user-image img-responsive">
                        @else
                            <img src="{{ URL::to('/') }}/dist/img/user.png" class="user-image" alt="User Image">
                        @endif

                        <span class="hidden-xs">{{$user->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if (Storage::disk('local')->has($user->image))
                                <img src="{{ route('account.image', ['filename' => $user->image]) }}" alt="" class="img-circle img-responsive">
                            @else
                                <img src="{{ URL::to('/') }}/dist/img/user.png" class="img-circle" alt="User Image">
                            @endif
                            <p>
                                {{$user->name}}
                                <small dir="rtl">عضویت:<br>{{jDateTime::convertFormatToFormat("Y-m-d","Y-m-d",mb_substr($user->created_at,0,10))}}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('logout') }}" class="btn btn-danger btn-flat">خروج</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>