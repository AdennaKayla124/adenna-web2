
<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">

            {{-- Search --}}
            <div class="d-flex align-items-center">
                <form class="navbar-search form-inline" id="navbar-search-main">
                    <div class="input-group input-group-merge search-bar">
                        <span class="input-group-text" id="topbar-addon">
                            <svg class="icon icon-xs"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd">
                                </path>
                            </svg>
                        </span>

                        <input type="text"
                               class="form-control"
                               id="topbarInputIconLeft"
                               placeholder="Search"
                               aria-label="Search">
                    </div>
                </form>
            </div>

            {{-- Navbar Links --}}
            <ul class="navbar-nav align-items-center">

                @if (Auth::check())

                    {{-- Notification --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark notification-bell dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            <svg class="icon icon-sm text-gray-900"
                                 fill="currentColor"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end mt-2 py-2">
                            <a href="#" class="dropdown-item text-center fw-bold">
                                Notifications
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                No new notifications
                            </a>
                        </div>
                    </li>

                    {{-- Profile User --}}
                    <li class="nav-item dropdown ms-lg-3">

                        <a class="nav-link dropdown-toggle pt-1 px-0"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            <div class="media d-flex align-items-center">

                                <img class="avatar rounded-circle"
                                     alt="Profile"
                                     src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}">

                                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                    <span class="mb-0 font-small fw-bold text-gray-900">
                                        {{ Auth::user()->name }}
                                    </span>
                                </div>

                            </div>
                        </a>

                        {{-- Dropdown Menu --}}
                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">

                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="fas fa-user me-2 text-gray-400"></i>
                                My Profile
                            </a>

                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="fas fa-clock me-2 text-gray-400"></i>
                                {{ session('last_login') ?? 'Login Session' }}
                            </a>

                            <div class="dropdown-divider my-1"></div>

                            {{-- Logout --}}
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf

                                <button type="submit"
                                        class="dropdown-item d-flex align-items-center text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Logout
                                </button>
                            </form>

                        </div>
                    </li>

                @else

                    {{-- Belum Login --}}
                    <li class="nav-item">
                        <a class="btn btn-primary"
                           href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>
                            Login
                        </a>
                    </li>

                @endif

            </ul>
        </div>
    </div>
</nav>
