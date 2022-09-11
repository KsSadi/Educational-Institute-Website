<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="{{ route('dashboard') }}"><span style="margin-top: -10px" class="brand-logo">
                        <img src="/storage/{{$global->logo}}" alt="SUB"/>

                        </span>
                    <h2 class="brand-text" style="margin-top: -5px">{{$global->short_name}}</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if (Auth::guard('admin')->user()->can('dashboard.view'))
            <li class=" nav-item  @if (Request::is('dashboard')) nav-item active
								  @endif">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">

                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>

            </li>
            @endif
                @if (Auth::guard('admin')->user()->can('slider.view'))

                    <li class=" nav-item  @if (Request::is('dashboard/sliders*'))
                        nav-item active @endif">
                        <a class="d-flex align-items-center" href="{{ route('dashboard.sliders.index') }}"><i data-feather='image'></i><span class="menu-title text-truncate" data-i18n="Datatable">Sliders</span></a>
                    </li>
                @endif

                @if (Auth::guard('admin')->user()->can('speech.view'))

                    <li class=" nav-item  @if (Request::is('dashboard/speeches*'))
                        nav-item active @endif">
                        <a class="d-flex align-items-center" href="{{ route('dashboard.speeches.index') }}"><i data-feather='twitch'></i><span class="menu-title text-truncate" data-i18n="Datatable">Speech</span></a>
                    </li>
                @endif
                @if (Auth::guard('admin')->user()->can('notice.view'))

                    <li class=" nav-item  @if (Request::is('dashboard/notices*'))
                        nav-item active @endif">
                        <a class="d-flex align-items-center" href="{{ route('dashboard.notices.index') }}"><i data-feather='paperclip'></i><span class="menu-title text-truncate" data-i18n="Datatable">Notices</span></a>
                    </li>
                @endif

            {{--Admin Start User--}}


            @if (Auth::guard('admin')->user()->can('role.view') ||Auth::guard('admin')->user()->can('admin.view') || Auth::guard('admin')->user()->can('global.setting'))
                <div class="divider divider-info divider-start">
                    <div class="divider-text"> Admin Panel </div>
                </div>



             @if (Auth::guard('admin')->user()->can('role.view'))


                    <li class=" nav-item  @if (Request::is('dashboard/roles*'))
                        nav-item active
@endif"><a class="d-flex align-items-center" href="{{ route('dashboard') }}/roles"><i data-feather='cpu'></i><span class="menu-title text-truncate" data-i18n="Datatable">Roles</span></a>

                    </li>
                @endif

{{--// Admin Panel Start--}}
                @if (Auth::guard('admin')->user()->can('admin.view'))

                    <li class=" nav-item  @if (Request::is('dashboard/admins*'))
                        nav-item active @endif">
                        <a class="d-flex align-items-center" href="{{ route('dashboard') }}/admins"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Datatable">Users</span></a>
                    </li>
                @endif
                    @if (Auth::guard('admin')->user()->can('global.setting'))

                        <li class=" nav-item  @if (Request::is('dashboard/settings*'))
                        nav-item active @endif">
                            <a class="d-flex align-items-center" href="{{ route('dashboard.settings.index') }}"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Datatable">Global Setting</span></a>
                        </li>
                    @endif
            @endif

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
