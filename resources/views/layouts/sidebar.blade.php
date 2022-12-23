<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#" target="_blank">Imam Al Jazary</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#" target="_blank"><img src="{{ asset('assets/img/aljazary.jpg') }}" alt="logo" width="50"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main Menu</li>
            <li class="{{ (request()->routeIs('home*')) ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-home"></i><span>Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->role != 'Santri')
            <li class="{{ (request()->routeIs('santri*')) ? 'active' : '' }}">
                <a href="{{ route('santri.index') }}" class="nav-link">
                    <i class="fas fa-users"></i><span>Santri & Pengurus</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->role != 'Santri')
            <li class="{{ (request()->routeIs('donatur*')) ? 'active' : '' }}">
                <a href="{{ route('donatur.index') }}" class="nav-link">
                    <i class="fas fa-wallet"></i><span>Donatur</span>
                </a>
            </li>
            <li class="menu-header">Keuangan</li>
            <li class="{{ (request()->routeIs('biaya*')) ? 'active' : '' }}">
                <a href="{{ route('biaya.index') }}" class="nav-link">
                    <i class="far fa-file-alt"></i><span>Biaya Pembayaran</span>
                </a>
            </li>
            @endif
            <li class="dropdown {{ (request()->routeIs('syahriah*') || request()->routeIs('registration*')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-invoice"></i> <span>Pembayaran</span></a>
                <ul class="dropdown-menu">
                    @if(Auth::user()->role != 'Santri')
                    <li class="{{ (request()->routeIs('registration*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('registration.index') }}">Pendaftaran Baru</a>
                    </li>
                    @endif
                    <li class="{{ (request()->routeIs('syahriah*')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('syahriah.index') }}">Iuran</a>
                    </li>
                </ul>
            </li>
            @if(Auth::user()->role != 'Santri')
            <li class="{{ (request()->routeIs('buku-kas*')) ? 'active' : '' }}">
                <a href="{{ route('buku-kas.index') }}" class="nav-link">
                    <i class="fas fa-book-open"></i><span>Buku Kas</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->role == 'Administrator')
            <li class="menu-header">User</li>
            <li class="{{ (request()->routeIs('pengguna*')) ? 'active' : '' }}">
                <a href="{{ route('pengguna.index') }}" class="nav-link">
                    <i class="fas fa-user-cog"></i><span>Data Pengguna</span>
                </a>
            </li>
            <li class="menu-header">Logs</li>
            <li class="{{ (request()->routeIs('logs.index')) ? 'active' : '' }}">
                <a href="{{ route('logs.index') }}" class="nav-link">
                    <i class="fas fa-history"></i><span>Log Aktivitas</span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>
