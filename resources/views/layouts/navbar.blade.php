<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="fas fa-bars"></i>
            </a>
            <a href="#!">
                TEST LOGO
            </a>
            <a class="mobile-options">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        </div>
        <div class="navbar-container">
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets/images/avatar-4.jpg') }}" class="img-radius"
                                alt="User-Profile-Image">
                            <span>{{ $user->name ?? '' }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <a href="#!">
                                    <i class="fas fa-cog"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <i class="fas fa-envelope"></i> My Messages
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <i class="fas fa-lock"></i> Lock Screen
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    @csrf <!-- Include CSRF token if using Laravel -->
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
