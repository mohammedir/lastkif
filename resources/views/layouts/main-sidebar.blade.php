<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">


                    <!-- menu item todo-->
                    <li>
                        <a href="{{ url('/' . $page='dashboard') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main-sidebar-trans.Dashboard')}}</span> </a>
                    </li>
                    <!-- menu title -->
<!--                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                        -->

                    @can('show-pages-sidebar')
                    <!-- menu item chat-->
                    <li>
                        <a href="{{ url('/' . $page='pages') }}"><i class="ti-comments"></i><span class="right-nav-text">{{trans('main-sidebar-trans.Pages')}}
                            </span></a>
                    </li>
                    @endcan()

                @can('show-menus-sidebar')
                    <!-- menu mange todo-->
                    <li>
                        <a href="{{ url('/' . $page='menus') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main-sidebar-trans.menu-sidebar')}}</span> </a>
                    </li>
                @endcan()

                @can('show-slider-sidebar')
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ url('/' . $page='slider') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{trans('main-sidebar-trans.Slider')}}</span> </a>
                    </li>
                @endcan()

<!--                    &lt;!&ndash; menu item mailbox&ndash;&gt;
                    <li>
                        <a href="{{ url('/' . $page='SEO-Page') }}"><i class="ti-email"></i><span class="right-nav-text">SEO
                                box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                    </li>-->


                    <!-- menu item getNotification -->
                    @can('show-subscribedUsers-sidebar')
                    <li>
                        <a href="{{ url('/' . $page='getNotification') }}"><i class="ti-comments"></i><span class="right-nav-text">{{trans('main-sidebar-trans.Subscribed-Users')}}
                            </span></a>
                    </li>
                   @endcan()


                @can('show-users-sidebar')
                    <!-- menu item Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('main-sidebar-trans.Users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>

                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            @can('show-user-list')
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">{{trans('main-sidebar-trans.Users-list')}}</a></li>
                            @endcan()
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">{{trans('main-sidebar-trans.Users-Permissions')}}</a></li>

                        </ul>
                    </li>
                @endcan()



                    <!-- Widgets  -->
<!--                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li>
                    -->
                    <!-- menu item Widgets-->
                    <li>
                        <a href="{{ url('/' . $page='widgets') }}"><i class="ti-blackboard"></i><span class="right-nav-text">{{trans('main-sidebar-trans.Widgets')}}</span>
                            </a>
                    </li>

                    <!-- menu item Widgets-->
                    <li>
                        <a href="{{ url('/' . $page='settings') }}"><i class="ti-blackboard"></i><span class="right-nav-text">{{trans('main-sidebar-trans.setting')}}</span>
                        </a>
                    </li>

<!--                    &lt;!&ndash; menu item social media&ndash;&gt;
                    <li>
                        <a href="{{ url('/' . $page='socialmedia') }}"><i class="ti-comments"></i><span class="right-nav-text">social media
                            </span></a>
                    </li>-->



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
