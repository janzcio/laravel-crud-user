<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ Route::currentRouteName() === 'dashboard' ? 'pcoded-trigger' : '' }}">
                <a href="{{route('dashboard')}}">
                    <span class="pcoded-micon"><i class="fas fa-tachometer-alt"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="{{ Route::currentRouteName() === 'users.index' ? 'pcoded-trigger' : '' }}">
                <a href="{{route('users.index')}}">
                    <span class="pcoded-micon"><i class="fas fa-users"></i></span>
                    <span class="pcoded-mtext">Users</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
