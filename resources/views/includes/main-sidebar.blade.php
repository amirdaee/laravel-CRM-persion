<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                @if (Storage::disk('local')->has($user->image))
                <img src="{{ route('account.image', ['filename' => Auth::user()->image]) }}" alt="" class="img-circle">
                @else
                <img src="{{ URL::to('/') }}/dist/img/user.png" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{$user->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">@include('includes.all.clock')</li>

            @if($user->hasRoles('Admin'))
                <li class="">
                    <a href="#">
                        <i class="fa fa-magic"></i>
                        <span>مدیریت</span>
                        <i class="fa fa-angle-left pull-left icon-left-center"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-share"></i>
                                <span>کاربران</span>
                                <i class="fa fa-angle-left pull-left icon-left-center"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{route('users')}}">
                                        <i class="fa fa-users"></i> <span> همه کاربران</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('signup')}}">
                                        <i class="fa fa-user"></i> <span>کاربر جدید </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-code-fork"></i> <span>نقش ها</span>
                                <i class="fa fa-angle-left pull-left icon-left-center"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{route('roles')}}">
                                        <span>همه نقش ها</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('roles.create')}}">
                                        <span>ایجاد نقش</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('roles.delete')}}">
                                        <span>حذف نقش</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-code"></i> <span>دسترسی ها</span>
                                <i class="fa fa-angle-left pull-left icon-left-center"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{route('permissions.create')}}">
                                        <span>ایجاد دسترسی</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('permissions.delete')}}">
                                        <span>حذف دسترسی</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-share"></i>
                                <span>خدمات</span>
                                <i class="fa fa-angle-left pull-left icon-left-center"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{route('services')}}">
                                        <i class="fa fa-users"></i> <span>همه خدمات</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('services.create')}}">
                                        <i class="fa fa-user"></i> <span>ایجاد خدمت جدید </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('services.delete')}}">
                                        <i class="fa fa-user"></i> <span>حذف خدمت  </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-share"></i>
                                <span>مراحل</span>
                                <i class="fa fa-angle-left pull-left icon-left-center"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{route('states')}}">
                                        <i class="fa fa-users"></i> <span>همه مراحل</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('states.create')}}">
                                        <i class="fa fa-user"></i> <span>ایجاد مرحله جدید </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="">
                <a href="#">
                    <i class="fa fa-child"></i> <span>صفحه شخصی</span>
                    <i class="fa fa-angle-left pull-left icon-left-center"></i>

                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-user"></i>صفحه کاربری</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>