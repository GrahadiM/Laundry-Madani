
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-lime elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link bg-gray-dark text-center">
                {{-- <img src="{{ \Setting::getSetting()->logo == null ? Storage::url('public/images/setting/logo_default.png') : Storage::disk('local')->url('public/images/setting/'.\Setting::getSetting()->logo) }}" alt="{{ config('app.name', 'Laravel') }}" class="brand-image elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-bold text-uppercase">{{ config('app.name', \Setting::getSetting()->name_web) }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-compact nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>{{ trans('menu.dashboard.title') }}</p>
                            </a>
                        </li>
                        @if (auth()->user()->hasRole('admin'))
                        <li class="nav-item {{ Request::is('admin/categories*') || Request::is('admin/packages*')  ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>{{ trans('menu.packageManagement.title') }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ trans('menu.category.title') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.packages.index') }}" class="nav-link {{ Request::is('admin/packages*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ trans('menu.package.title') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is('admin/transactions*')  ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>{{ trans('menu.transactionManagement.title') }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ Request::is('admin/transactions*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ trans('menu.transaction.title') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ Request::is('admin/users*') || Request::is('admin/roles*')  ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>{{ trans('menu.userManagement.title') }} <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ trans('menu.permission.title') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ trans('menu.role.title') }}</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                                        <i class="fas fa-angle-right nav-icon"></i>
                                        <p>{{ trans('menu.user.title') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('admin/terms_of_service*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Persyaratan Layanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ Request::is('admin/privacy_policy*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Kebijakan Privasi</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->

            <div class="sidebar-custom">
                @if (auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.setting.index') }}" class="btn btn-link"><i class="fas fa-cogs"></i></a>
                @endif
                <a href="{{ route('logout') }}" class="btn btn-danger hide-on-collapse pos-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- /.sidebar-custom -->
        </aside>
