<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex align-items-center">
                <!-- Search form -->
                <form class="navbar-search form-inline" id="navbar-search-main">
                    <div class="input-group input-group-merge search-bar">
                        <span class="input-group-text" id="topbar-addon">
                            <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search"
                            aria-label="Search" aria-describedby="topbar-addon">
                    </div>
                </form>
                <!-- / Search form -->
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ms-lg-3 pt-1 px-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="media d-flex align-items-center">
                        {{-- Foto Profil --}}
                        <img class="avatar rounded-circle me-2" alt="Image placeholder"
                            src="{{ asset('assets/admin/img/team/profile-picture-3.jpg') }}">

                        <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                            {{-- Nama Pengguna --}}
                            <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-end mt-2 py-1">
                    {{-- Tautan My Profile --}}
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd"></path>
                        </svg>
                        My Profile
                    </a>

                    {{-- Tautan Settings --}}
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-.04-.76-.04-1.15 0a3.99 3.99 0 00-3.9 3.7.999.999 0 01-1.37.58A6.993 6.993 0 013 10c0 1.95.83 3.73 2.14 4.97a.999.999 0 011.37.58 3.99 3.99 0 003.9 3.7c.39 0 .77-.04 1.15 0a3.99 3.99 0 003.9-3.7.999.999 0 011.37-.58A6.993 6.993 0 0117 10c0-1.95-.83-3.73-2.14-4.97a.999.999 0 01-1.37-.58 3.99 3.99 0 00-3.9-3.7zm-2.06 6.81a2 2 0 10-2-2 2 2 0 002 2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Settings
                    </a>

                    {{-- Divider --}}
                    <div role="separator" class="dropdown-divider my-1"></div>

                    {{-- Tautan Logout --}}
                    <a class="dropdown-item d-flex align-items-center" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6-4v1a3 3 0 01-3 3H6a3 3 0 01-3-3v-1a3 3 0 013-3h4a3 3 0 013 3v1m0 0V9m0 0a1 1 0 00-1-1H7a1 1 0 00-1 1v1a1 1 0 001 1h4a1 1 0 001-1V9z">
                            </path>
                        </svg>
                        Logout
                    </a>

                    {{-- Formulir Logout Tersembunyi --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
        </div>
    </div>
</nav>
