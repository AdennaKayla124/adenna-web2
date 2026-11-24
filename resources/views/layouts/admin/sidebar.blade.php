
<nav id="sidebarMenu" class="sidebar d-md-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">

        {{-- User Profile --}}
        @if (Auth::check())
            <div class="user-card d-flex align-items-center justify-content-between pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-3">
                        <img
                            src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}"
                            class="card-img-top rounded-circle border-white"
                            alt="User Profile"
                        >
                    </div>

                    <div class="d-block">
                        <h2 class="h6 mb-0 text-white">
                            {{ Auth::user()->name }}
                        </h2>
                        <small class="text-gray-300">Administrator</small>
                    </div>
                </div>
            </div>
        @endif

        {{-- Menu Sidebar --}}
        <ul class="nav flex-column pt-3">

            {{-- Dashboard --}}
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="7" height="7"
                                rx="1" stroke-width="2"/>
                            <rect x="14" y="3" width="7" height="7"
                                rx="1" stroke-width="2"/>
                            <rect x="3" y="14" width="7" height="7"
                                rx="1" stroke-width="2"/>
                            <rect x="14" y="14" width="7" height="7"
                                rx="1" stroke-width="2"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>

            {{-- Data Pelanggan --}}
            <li class="nav-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <a href="{{ route('pelanggan.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16 21v-2a4 4 0 00-8 0v2M12 11a4 4 0 100-8 4 4 0 000 8zm7 10v-2a4 4 0 00-3-3.87M17 3.13a4 4 0 010 7.75"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Data Pelanggan</span>
                </a>
            </li>

            {{-- Data User --}}
            <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4"
                                stroke-width="2"/>
                            <path stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 21v-2a7 7 0 0114 0v2M19 8h3m-1.5-1.5v3"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Data User</span>
                </a>
            </li>

            {{-- Divider --}}
            <li role="separator"
                class="dropdown-divider mt-4 mb-3 border-gray-700">
            </li>

            {{-- Documentation --}}
            <li class="nav-item">
                <a href="https://themesberg.com/docs/volt-bootstrap-5-dashboard/"
                    target="_blank" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 19.5A2.5 2.5 0 016.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                        </svg>
                    </span>
                    <span class="sidebar-text">Documentation</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
