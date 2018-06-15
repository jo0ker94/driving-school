<!-- Main Header -->
<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar"  role="navigation">
        <!-- Sidebar toggle button-->
        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">
                           @if(Auth::check()) 
                                {{ Auth::user()->name }}
                            @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
                <li>

                </li>
            </ul>
        </div>
    </nav>
</header>