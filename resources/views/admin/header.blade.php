<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Fax</b>IT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Fax</b>IT</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        {{ Auth::user()->full_name }}
                        <img src="{{ asset("/assets/images/admin/user2-160x160.jpg") }}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/assets/images/admin/user2-160x160.jpg") }}" class="img-circle" alt="User Image">

                            <p>
                                <div>
                                    {{ Auth::user()->full_name }}
                                </div>
                                <div>
                                    {{ Auth::user()->entity->name }}
                                </div>
                                <ul>
                                    @foreach(Auth::user()->roles as $role)
                                    <li>{{ $role->name }}</li>
                                    @endforeach
                                </ul>

                                <small>Created {{ Auth::user()->created_at->toDayDateTimeString() }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        {{-- Menu Here --}}
                        <!-- ./ Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Signed Out
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>