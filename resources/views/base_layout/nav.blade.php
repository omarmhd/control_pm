<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU1 -->
        <ul class="page-sidebar-menu hidden-sm hidden-xs" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->

                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
         @can('admin')

            <li class="start @isset($active) {{ $active == 'order' ? 'active open' : '' }}  @endisset">
                <a href="javascript:;">
                <i class="fa fa-cubes"></i>
                <span class="title">
                    Orders management </span>
                <span class="arrow open">
                </span>
                <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li @isset($activeSub) {{ $activeSub == 'order.index' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.order.index') }}">
                            <i class=" fa fa-reorder"></i>

                            Orders </a>
                    </li>
                    <li @isset($activeSub) {{ $activeSub == 'order.send.index' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.order.send.index') }}">
                            <i class="fa fa-info-circle"></i>

                            Orders notsent </a>
                    </li>
                    <li @isset($activeSub) {{ $activeSub == 'order.send.to.provider' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.order.send.to.provider.index') }}">
                            <i class=" fa fa-send"></i>

                             Orders Sent</a>
                    </li>
                    <li @isset($activeSub) {{ $activeSub == 'accept.order.by.provider' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.accept.order.by.provider.index') }}">
                            <i class=" fa fa-plane"></i>

                           Orders onprogress </a>
                    </li>

                    <li @isset($activeSub) {{ $activeSub == 'reject.order.by.provider' ? 'class=active' : '' }}  @endisset>

                        <a href="{{ route('admin.reject.order.by.provider.index') }}">
                            <i class=" fa fa-close"></i>
                             Orders rejected </a>
                    </li>
                    <li @isset($activeSub) {{ $activeSub == 'complete.order.by.provider' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.complete.order.by.provider.index') }}">
                            <i class="fa fa-truck"></i>
                            Orders Compeleted </a>
                    </li>
                    <li @isset($activeSub) {{ $activeSub == 'edit.order.after.compeleted' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.edit.order.after.compeleted.index') }}">
                            <i class="fa fa-pencil-square"></i>Under modification </a>
                    </li>
                    <li @isset($activeSub) {{ $activeSub == 'close.order' ? 'class=active' : '' }}  @endisset>
                        <a href="{{ route('admin.close.order.index') }}">
                              <i class="fa fa-unlock-alt"></i>
                            Orders Closed </a>
                    </li>
                </ul>

            </li>
            <li class="start @isset($active) {{ $active == 'invoice' ? 'active open' : '' }}  @endisset">

                <a href="javascript:;">
                <i class="fa fa-file"></i>
                <span class="title">
                    Invoices management </span>
                <span class="arrow open">
                </span>
                <span class="selected"></span>
                </a>
                <ul class="sub-menu">
                    <li  @isset($activeSub) {{ $activeSub == 'invoice.index' ? 'class=active' : '' }}  @endisset >
                        <a href="{{ route('admin.invoice.index') }}">
                            <i class="fa fa-plus-square"></i>

                            Invoices </a>
                    </li>
                </ul>
                <li class="start @isset($active) {{ $active == 'user' ? 'active open' : '' }}  @endisset">
                    <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">
                    Users Mangment </span>
                    <span class="arrow open">
                    </span>
                    <span class="selected"></span>
                    </a>
                    <ul class="sub-menu">
                        <li  @isset($activeSub) {{ $activeSub == 'provider.index' ? 'class=active' : '' }}  @endisset >
                            <a href="{{ route('admin.provider.index') }}">
                                <i class="fa fa-user-plus"></i>
                                Providers </a>
                        </li>
                        <li  @isset($activeSub) {{ $activeSub == 'client.index' ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('admin.client.index') }}">
                                <i class="fa fa-user"></i>
                                Clients </a>
                        </li>
                    </ul>

                </li>
                <li class="start @isset($active) {{ $active == 'setting' ? 'active open' : '' }}  @endisset">
                    <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span class="title">
                    Setting </span>
                    <span class="arrow open">
                    </span>
                    <span class="selected"></span>
                    </a>
                    <ul class="sub-menu">
                        <li  @isset($activeSub) {{ $activeSub == 'setting.admin' ? 'class=active' : '' }}  @endisset >

                            <a href="{{ route('setting') }}">
                                <i class="fa fa-wrench"></i>

                            Setting admin </a>
                        </li>
                        <li  @isset($activeSub) {{ $activeSub == 'setting.googleMail' ? 'class=active' : '' }}  @endisset >

                            <a href="{{ route('admin.setting.googleMail') }}">
                                <i class="fa fa-wrench"></i>

                            Setting google mail </a>
                        </li>
                    </ul>

                </li>
                @endcan
                @can('provider')


                <li class="start active open" >
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span class="title">
                            Service provider </span>
                        <span class="arrow open">
                        </span>
                        <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">

                        <li @isset($activeSub) {{ $activeSub == 1 ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('provider.order.index') }}">
                                <i class=" fa fa-reorder"></i>
                                Orders </a>
                        </li>
                        <li @isset($activeSub) {{ $activeSub == 2 ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('order.send') }}">
                                <i class=" fa fa-send"></i>
                                 Sent orders </a>
                        </li>
                        <li @isset($activeSub) {{ $activeSub == 3 ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('order.onprogress') }}">
                                <i class=" fa fa-plane"></i>   orders onprogress</a>
                        </li>


                        <li @isset($activeSub) {{ $activeSub == 4 ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('order.completed') }}">
                                <i class="fa fa-truck"></i>
                                Orders Compeleted </a>
                        </li>
                        <li @isset($activeSub) {{ $activeSub == 5 ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('order.modification') }}">
                                <i class="fa fa-pencil-square"></i>
                                Orders  modification </a>
                        </li>

                        <li @isset($activeSub) {{ $activeSub == 6 ? 'class=active' : '' }}  @endisset>
                            <a href="{{ route('provider.invoice') }}">
                                <i class="fa fa-folder-open"></i>
                                Invoices </a>
                        </li>
                        </ul>
                </li>

                @endcan

            </ul>


        <!-- END SIDEBAR MENU1 -->
        <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
        <ul class="page-sidebar-menu visible-sm visible-xs" data-slide-speed="200" data-auto-scroll="true">
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <!-- DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn submit"><i class="icon-magnifier"></i></button>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start active open">
                <a href="index.html">
                Dashboard <span class="selected">
                </span>
                <span class="arrow open">
                </span>
                </a>
                <ul class="sub-menu">
                    <li class="active open">
                        <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span class="title">
                        Page Layouts </span>
                        <span class="arrow open">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li class="active">
                                <a href="layout_horizontal_sidebar_menu.html">
                                Horizontal & Sidebar Menu </a>
                            </li>
                            <li>
                                <a href="index_horizontal_menu.html">
                                Dashboard & Mega Menu </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu1.html">
                                Horizontal Mega Menu 1 </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu2.html">
                                Horizontal Mega Menu 2 </a>
                            </li>
                            <li>
                                <a href="layout_fontawesome_icons.html">
                                <span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
                            </li>
                            <li>
                                <a href="layout_glyphicons.html">
                                Layout with Glyphicon</a>
                            </li>
                            <li>
                                <a href="layout_full_height_portlet.html">
                                <span class="badge badge-roundless badge-success">new</span>Full Height Portlet</a>
                            </li>
                            <li>
                                <a href="layout_full_height_content.html">
                                <span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
                            </li>
                            <li>
                                <a href="layout_search_on_header1.html">
                                Search Box On Header 1 </a>
                            </li>
                            <li>
                                <a href="layout_search_on_header2.html">
                                Search Box On Header 2 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_search_option1.html">
                                Sidebar Search Option 1 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_search_option2.html">
                                Sidebar Search Option 2 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_reversed.html">
                                <span class="badge badge-roundless badge-warning">
                                new </span>
                                Right Sidebar Page </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_fixed.html">
                                Sidebar Fixed Page </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_closed.html">
                                Sidebar Closed Page </a>
                            </li>
                            <li>
                                <a href="layout_ajax.html">
                                Content Loading via Ajax </a>
                            </li>
                            <li>
                                <a href="layout_disabled_menu.html">
                                Disabled Menu Links </a>
                            </li>
                            <li>
                                <a href="layout_blank_page.html">
                                Blank Page </a>
                            </li>
                            <li>
                                <a href="layout_boxed_page.html">
                                Boxed Page </a>
                            </li>
                            <li>
                                <a href="layout_language_bar.html">
                                Language Switch Bar </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="fa fa-th-list"></i>
                        <span class="title">
                        Portlets </span>
                        <span class="arrow ">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="portlet_general.html">
                                General Portlets </a>
                            </li>
                            <li>
                                <a href="portlet_draggable.html">
                                Draggable Portlets </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="fa fa-map-marker"></i>
                        <span class="title">
                        Maps </span>
                        <span class="arrow ">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="maps_google.html">
                                Google Maps </a>
                            </li>
                            <li>
                                <a href="maps_vector.html">
                                Vector Maps </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="charts.html">
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="title">
                        Visual Charts </span>
                        </a>
                    </li>
                    <li>
                        <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span class="title">
                        Login Page </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                Mega <span class="arrow">
                </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        Layouts <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index_horizontal_menu.html">
                                Dashboard & Mega Menu </a>
                            </li>
                            <li>
                                <a href="layout_fontawesome_icons.html">
                                <span class="badge badge-roundless badge-danger">new</span>Layout with Fontawesome Icons</a>
                            </li>
                            <li>
                                <a href="layout_glyphicons.html">
                                Layout with Glyphicon</a>
                            </li>
                            <li>
                                <a href="layout_full_height_portlet.html">
                                <span class="badge badge-roundless badge-success">new</span>Full Height Portlet</a>
                            </li>
                            <li>
                                <a href="layout_full_height_content.html">
                                <span class="badge badge-roundless badge-warning">new</span>Full Height Content</a>
                            </li>
                            <li>
                                <a href="layout_horizontal_sidebar_menu.html">
                                Horizontal & Sidebar Menu </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu1.html">
                                Horizontal Mega Menu 1 </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu2.html">
                                Horizontal Mega Menu 2 </a>
                            </li>
                            <li>
                                <a href="layout_search_on_header1.html">
                                Search Box On Header 1 </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        More Layouts <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layout_search_on_header2.html">
                                Search Box On Header 2 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_search_option1.html">
                                Sidebar Search Option 1 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_search_option2.html">
                                Sidebar Search Option 2 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_reversed.html">
                                <span class="badge badge-roundless badge-success">
                                new </span>
                                Right Sidebar Page </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_fixed.html">
                                Sidebar Fixed Page </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_closed.html">
                                Sidebar Closed Page </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Even More <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layout_ajax.html">
                                Content Loading via Ajax </a>
                            </li>
                            <li>
                                <a href="layout_disabled_menu.html">
                                Disabled Menu Links </a>
                            </li>
                            <li>
                                <a href="layout_blank_page.html">
                                Blank Page </a>
                            </li>
                            <li>
                                <a href="layout_boxed_page.html">
                                Boxed Page </a>
                            </li>
                            <li>
                                <a href="layout_language_bar.html">
                                Language Switch Bar </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                Full Mega <span class="arrow">
                </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        Layouts <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index_horizontal_menu.html">
                                Dashboard & Mega Menu </a>
                            </li>
                            <li>
                                <a href="layout_glyphicons.html">
                                Layout with Glyphicon <span class="badge badge-roundless badge-danger">
                                new </span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_sidebar_menu.html">
                                Horizontal & Sidebar Menu </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu1.html">
                                Horizontal Mega Menu 1 </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu2.html">
                                Horizontal Mega Menu 2 </a>
                            </li>
                            <li>
                                <a href="layout_search_on_header1.html">
                                Search Box On Header 1 </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        More Layouts <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layout_search_on_header2.html">
                                Search Box On Header 2 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_search_option1.html">
                                Sidebar Search Option 1 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_search_option2.html">
                                Sidebar Search Option 2 </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_reversed.html">
                                <span class="badge badge-roundless badge-success">
                                new </span>
                                Right Sidebar Page </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_fixed.html">
                                Sidebar Fixed Page </a>
                            </li>
                            <li>
                                <a href="layout_sidebar_closed.html">
                                Sidebar Closed Page </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Even More <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layout_ajax.html">
                                Content Loading via Ajax </a>
                            </li>
                            <li>
                                <a href="layout_disabled_menu.html">
                                Disabled Menu Links </a>
                            </li>
                            <li>
                                <a href="layout_blank_page.html">
                                Blank Page </a>
                            </li>
                            <li>
                                <a href="layout_boxed_page.html">
                                Boxed Page </a>
                            </li>
                            <li>
                                <a href="layout_language_bar.html">
                                Language Switch Bar </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Accordions <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <div id="accordion2" class="panel-group mega-menu-responsive-content">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" class="collapsed">
                                            Mega Menu Info #1 </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne2" class="panel-collapse in">
                                            <div class="panel-body">
                                                 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="collapsed">
                                            Mega Menu Info #2 </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2">
                                            Mega Menu Info #3 </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a>
                Classic <span class="arrow">
                </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                        Section 1 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Section 2 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Section 3 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Section 4 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        Section 5 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        More options <span class="arrow">
                        </span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;">
                                Second level link </a>
                            </li>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                More options <span class="arrow">
                                </span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="index.html">
                                        Third level link </a>
                                    </li>
                                    <li>
                                        <a href="index.html">
                                        Third level link </a>
                                    </li>
                                    <li>
                                        <a href="index.html">
                                        Third level link </a>
                                    </li>
                                    <li>
                                        <a href="index.html">
                                        Third level link </a>
                                    </li>
                                    <li>
                                        <a href="index.html">
                                        Third level link </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index.html">
                                Second level link </a>
                            </li>
                            <li>
                                <a href="index.html">
                                Second level link </a>
                            </li>
                            <li>
                                <a href="index.html">
                                Second level link </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
    </div>
</div>
