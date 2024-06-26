<div class="ecaps-sidemenu-area bg-img" style="background: linear-gradient(154.36deg,#041942 21.07%,#041526 81.669%)">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{ route('adminDashboard') }}">
            <img class="desktop-logo" src="{{ asset('admin_src/img/core-img/Logo.png') }}" alt="Desktop Logo">
            <img class="small-logo" src="{{ asset('admin_src/img/core-img/small-logo.png') }}" alt="Mobile Logo">
        </a>
    </div>

    @php
        $currentRoute = request()->route()->getName();
    @endphp

    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li @if( $currentRoute === 'adminDashboard' ) class="active"@endif>
                        <a href="{{ route('adminDashboard') }}">
                            <i class='fa fa-home'></i>
                            <span>Головна</span>
                        </a>
                    </li>

                    <li class="treeview {{ in_array($currentRoute, [
                            'admin.car-common-settings.edit.page',
                            'admin.one.car.page',
                        ]) ? 'active' : '' }}">
                        <a href="javascript:void(0)">
                            <i class='fa fa-folder-open'></i>
                            <span>{{ trans('admin.settings') }}</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li @if( $currentRoute === 'admin.car-common-settings.edit.page' ) class="active"@endif><a href="{{ route('admin.car-common-settings.edit.page') }}">{{ trans('admin.car_common_settings') }}</a></li>
                        </ul>
                        <ul class="treeview-menu">
                            <li @if( $currentRoute === 'admin.one.car.page' ) class="active"@endif><a href="{{ route('admin.one.car.page') }}">{{ 'One Car Page' }}</a></li>
                        </ul>
                    </li>

                    <li class="treeview {{ in_array($currentRoute, [
                        'admin.car-common-settings.edit.page',
                        'admin.one.car.page',
                    ]) ? 'active' : '' }}">
                    <a href="javascript:void(0)">
                        <i class='fa fa-folder-open'></i>
                        <span>{{ trans('admin.blog') }}</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    {{-- <ul class="treeview-menu">
                        <li @if( $currentRoute === 'admin.car-common-settings.edit.page' ) class="active"@endif><a href="{{ route('admin.car-common-settings.edit.page') }}">{{ trans('admin.car_common_settings') }}</a></li>
                    </ul> --}}
                    <ul class="treeview-menu">
                        <li @if( $currentRoute === 'admin.one.article.page' ) class="active"@endif><a href="{{ route('admin.one.article.page') }}">{{ 'One Article Page' }}</a></li>
                    </ul>
                </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
