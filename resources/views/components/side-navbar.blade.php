<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"><i class="me-3 far fa-clock fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('resident') }}" aria-expanded="false">
                        <i class="me-3 fa fa-user" aria-hidden="true"></i><span class="hide-menu">Resident's</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('incident-report.view')}}" aria-expanded="false"><i class="me-3 fa fa-archive" aria-hidden="true"></i><span class="hide-menu">Incident Report</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="" aria-expanded="false"><i class="me-3 fa fa-th-list" aria-hidden="true"></i><span class="hide-menu">LOGS</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="" aria-expanded="false"><i class="me-3 fa fa-truck-moving" aria-hidden="true"></i><span class="hide-menu">Inventory</span></a></li>

                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button style="background:none;border:none;outline:none;box-shadow:none;" type="submit" class="sidebar-link waves-effect waves-dark sidebar-link"><i class="me-3 fa fa-sign-out-alt" aria-hidden="true"></i><span class="hide-menu">Logout</span></button>
                    </form>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>