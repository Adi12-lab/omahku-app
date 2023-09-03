<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('category') }}" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('feature') }}" class=" waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Fasilitas</span>
                    </a>
                </li>


                @if (auth()->user()->role_as === 1)
                    <li class="menu-title">Units</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-account-circle-line"></i>
                            <span>Properties</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('property.create') }}">Tambah Properti</a></li>
                            <li><a href="auth-register.html">Semua Properti</a></li>
                        </ul>
                    </li>
                @endif



                <li class="menu-title">User</li>
                <li>
                    <a href="apps-chat.html" class=" waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Guest</span>
                    </a>
                </li>
                <li>
                    <a href="apps-chat.html" class=" waves-effect">
                        <i class="ri-chat-1-line"></i>
                        <span>Agent</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->