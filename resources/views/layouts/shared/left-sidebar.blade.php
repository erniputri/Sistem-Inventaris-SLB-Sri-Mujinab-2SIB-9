<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('any', 'index') }}" class="logo logo-light">

        <img src="https://dapo.kemdikbud.go.id/assets/img/logo-dikdasmen.png" alt="logo"width="50px" >

    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('any', 'index') }}" class="logo logo-dark">
    <img src="https://dapo.kemdikbud.go.id/assets/img/logo-dikdasmen.png" alt="logo" width="50px">
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{ url('/') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('ruangan.index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    
                    <span> Ruangan </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('barang.index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    
                    <span> Barang </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    
                    <span> Admin </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('guru.index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    
                    <span> Guru </span>
                </a>
            </li>
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->