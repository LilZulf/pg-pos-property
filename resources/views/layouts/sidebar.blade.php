<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box" style="background-color: #fff">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard.general') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/pg-logo.jpg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/pg-pos-property-logo.webp') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/pg-logo.jpg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/pg-pos-property-logo.webp') }}" alt="" height="40">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard.general') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sideTransaction" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sideTransaction">
                        <i class="ri-bank-line"></i> <span data-key="t-transaction">Transaction</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sideTransaction">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('virtual.index') }}" class="nav-link" data-key="t-analytics">
                                    <i class="ri-bank-card-2-fill"></i> <span data-key="t-virtual-account">Virtual
                                        Account</span> </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('qris.index') }}" class="nav-link" data-key="t-analytics">
                                    <i class="ri-qr-code-line"></i> <span data-key="t-virtual-account">QRIS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
