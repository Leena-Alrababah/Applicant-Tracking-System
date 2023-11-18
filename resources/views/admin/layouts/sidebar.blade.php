<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="">
                <img src="{{ asset('front-end/images/logo.png') }}" style="height: 60px">
                <span class="brand-name">Talent Space</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="@if (request()->is('home')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('home.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="@if (request()->is('jobs')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('jobs.index') }}">
                        <i class="mdi mdi-briefcase"></i>
                        <span class="nav-text">Jobs</span>
                    </a>
                </li>
                <li class="@if (request()->is('requirements')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('requirements.index') }}">
                        <i class="mdi mdi-briefcase-check"></i>
                        <span class="nav-text">Requirements</span>
                    </a>
                </li>
                <li class="@if (request()->is('benefits')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('benefits.index') }}">
                        <i class="mdi mdi-account-tie"></i>
                        <span class="nav-text">Benefits</span>
                    </a>
                </li>
                <li class="@if (request()->is('applicants')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('applicants.index') }}">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">Applicants</span>
                    </a>
                </li>
                <li class="@if (request()->is('talentpools')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('talentpools.index') }}">
                        <i class="mdi mdi-pool"></i>
                        <span class="nav-text">Talent Pools</span>
                    </a>
                </li>
                <li class="@if (request()->is('candidates')) active @endif">
                    <a class="sidenav-item-link" href="{{ route('candidates.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Candidates</span>
                    </a>
                </li>
                {{-- Add other menu items as needed --}}
            </ul>

        </div>
    </div>
</aside>
