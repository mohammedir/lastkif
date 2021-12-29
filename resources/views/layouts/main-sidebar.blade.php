<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">

                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ url('/' . $page='dashboard') }}"><i class="fas fa-home"></i><span
                                    class="right-nav-text">{{trans('main-sidebar-trans.Dashboard')}}</span> </a>
                    </li>
                    <!-- menu title -->
                    <!--                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                                            -->

                @can('show-pages-sidebar')
                    <!-- menu item chat-->
                        <li>
                            <a href="{{ url('/' . $page='pages') }}"><i class="ti-comments"></i><span
                                        class="right-nav-text">{{trans('main-sidebar-trans.Pages')}}
                            </span></a>
                        </li>
                @endcan()

                @can('show-menus-sidebar')
                    <!-- menu mange todo-->
                        <li>
                            <a href="{{ url('/' . $page='menus') }}"><i class="ti-menu-alt"></i><span
                                        class="right-nav-text">{{trans('main-sidebar-trans.menu-sidebar')}}</span> </a>
                        </li>
                @endcan()

                @can('show-slider-sidebar')
                    <!-- menu item todo-->
                        <li>
                            <a href="{{ url('/' . $page='slider') }}"><i class="ti-menu-alt"></i><span
                                        class="right-nav-text">{{trans('main-sidebar-trans.Slider')}}</span> </a>
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
                            <a href="{{ url('/' . $page='getNotification') }}"><i class="ti-comments"></i><span
                                        class="right-nav-text">{{trans('main-sidebar-trans.Subscribed-Users')}}
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
                                    <li><a class="slide-item"
                                           href="{{ url('/' . ($page = 'users')) }}">{{trans('main-sidebar-trans.Users-list')}}</a>
                                    </li>
                                @endcan()
                                <li><a class="slide-item"
                                       href="{{ url('/' . ($page = 'roles')) }}">{{trans('main-sidebar-trans.Users-Permissions')}}</a>
                                </li>

                            </ul>
                        </li>
                @endcan()



                <!-- Widgets  -->
                    <!--                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li>
                                        -->
                    <!-- menu item Widgets-->
                    <li>
                        <a href="{{ url('/' . $page='widgets') }}"><i class="ti-blackboard"></i><span
                                    class="right-nav-text">{{trans('main-sidebar-trans.Widgets')}}</span>
                        </a>
                    </li>

                    <!-- menu item Widgets-->
                    <li>
                        <a href="{{ url('/' . $page='settings') }}"><i class="ti-blackboard"></i><span
                                    class="right-nav-text">{{trans('main-sidebar-trans.setting')}}</span>
                        </a>
                    </li>

                <!--                    &lt;!&ndash; menu item social media&ndash;&gt;
                    <li>
                        <a href="{{ url('/' . $page='socialmedia') }}"><i class="ti-comments"></i><span class="right-nav-text">social media
                            </span></a>
                    </li>-->

                    <!--TODO::START MOOEMN ALDAH*DOUH ROUTE -->
                <!--                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/' . $page='events') }}"><i
                                class="far fa-calendar-alt"></i>Events</a>
                    </li>-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#events">
                            <div class="pull-left"><i class="fas fa-user-shield"></i><span
                                        class="right-nav-text">{{trans('main-sidebar-trans.events-sidbar')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>

                        </a>
                        <ul id="events" class="collapse" data-parent="#sidebarnav">
                            <li><a class="nav-link" aria-current="page" href="{{ url('/' . $page='events') }}"><i
                                            class="far fa-calendar-alt"></i>{{trans('main-sidebar-trans.events-sidbar')}}
                                </a>
                            </li>
                            <li><a class="slide-item" href="{{ url('/' . ($page = 'specialevents')) }}"><i
                                            class="fas fa-user-friends"></i>{{trans('main-sidebar-trans.special-events-sidbar')}}
                                </a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/' . $page='halls') }}"><i
                                    class="fas fa-place-of-worship"></i>Halls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/' . $page='customusers/agents/0') }}"><i
                                    class="far fa-user"></i>Agents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/' . $page='customusers/partners/1') }}"><i
                                    class="far fa-handshake"></i>Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/' . $page='customusers/managers/2') }}"><i
                                    class="fas fa-users-cog"></i>Managers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/' . $page='customusers/providers/3') }}"><i
                                    class="fas fa-user-astronaut"></i>Providers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/' . $page='annualreports') }}"><i
                                    class="far fa-copy"></i>{{trans('main-sidebar-trans.Annual Reports')}}</a>
                    </li>
                    <!--                    <li>
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom_users">
                                                <div class="pull-left"><i class="ti-palette"></i><span
                                                        class="right-nav-text">Custom Users</span></div>
                                                <div class="pull-right"><i class="ti-plus"></i></div>
                                                <div class="clearfix"></div>
                                            </a>
                                            <ul id="custom_users" class="collapse" data-parent="#sidebarnav">

                                            </ul>

                                        </li>-->
                    <!--TODO::END MOOMEN ROUT-->

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
