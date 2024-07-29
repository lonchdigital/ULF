<div class="ecaps-sidemenu-area bg-img" style="background: #fff">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{ route('adminDashboard') }}">
            <img class="desktop-logo" src="{{ asset('admin_src/img/core-img/main-logo.png') }}" alt="Desktop Logo">
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
                            <span>{{ trans('admin.main') }}</span>
                        </a>
                    </li>

                    <li class="treeview {{ in_array($currentRoute, [
                            'admin.car-common-settings.edit.page',
                            'admin.one.car.page',
                        ]) ? 'active' : '' }}">
                        <a href="javascript:void(0)">
                            <i class='fa fa-cog'></i>
                            <span>{{ trans('admin.settings') }}</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li @if( $currentRoute === 'admin.car-common-settings.edit.page' ) class="active"@endif><a href="{{ route('admin.car-common-settings.edit.page') }}">{{ trans('admin.car_common_settings') }}</a></li>
                        </ul>
                    </li>


                    <li @if( $currentRoute === 'article.index' ) class="active"@endif>
                        <a href="{{ route('article.index') }}">
                            <i class='fa fa-book'></i>
                            <span>{{ trans('admin.blog') }}</span>
                        </a>
                    </li>
                    <li @if( $currentRoute === 'admin.automatch.index' ) class="active"@endif>
                        <a href="{{ route('admin.automatch.index') }}">
                            <i class="fa fa-heart"></i>
                            <span>Automatch</span>
                        </a>
                    </li>
                    <li @if( $currentRoute === 'client.index' ) class="active"@endif>
                        <a href="{{ route('client.index') }}">
                            <i class='fa fa-user'></i>
                            <span>{{ trans('admin.clients_history') }}</span>
                        </a>
                    </li>

                    <li @if( $currentRoute === 'car.index' ) class="active"@endif>
                        <a href="{{ route('car.index') }}">
                            <i class='fa fa-car'></i>
                            <span>{{ trans('admin.cars_title') }}</span>
                        </a>
                    </li>

                    <li @if( $currentRoute === 'page.index' ) class="active"@endif>
                        <a href="{{ route('page.index') }}">
                            <i class="fa fa-file-powerpoint-o"></i>
                            <span>{{ trans('admin.pages_title') }}</span>
                        </a>
                    </li>

                    <li @if(Route::is('admin.pages.*')) class="active"@endif>
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="fa fa-file-powerpoint-o"></i>
                            <span>Список FAQs</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
