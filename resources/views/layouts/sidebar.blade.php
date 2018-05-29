<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Member</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('member.create') }}">New Member</a>
                    </li>
                    <li>
                        <a href="{{ route('member.index') }}">List Member</a>
                    </li>
                </ul>
            </li>

            <li class="heading">Administrator</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Role and Permission</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('role.index') }}">Role</a>
                    </li>
                    <li>
                        <a href="{{ route('permission.index') }}">Permission</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>