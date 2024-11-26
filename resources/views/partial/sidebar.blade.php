<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="align-middle">Inventarisasi</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header ">
                <i class="align-middle" data-feather="sliders"></i>
                <span class="align-middle">Master Data</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/merk') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">merk</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/jenis_barang') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">kategri Barang</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/lokasi') }}">
                    <i class="align-middle" data-feather="map-pin"></i> <span class="align-middle">Lokasi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/supplier') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Supplier</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ URL('/barangs') }}">
                    <i class="align-middle" data-feather="database"></i> <span class="align-middle">Barang</span>
                </a>
            </li>

            <li class="sidebar-header">
                <i class="align-middle" data-feather="settings"></i>
                <span class="align-middle">Transaksi</span>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ URL('penjualan') }}">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span
                        class="align-middle">Penjualan</span>
                </a>
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Pembelian</span>
                </a>
            </li>

            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.html">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-up.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign
                        Up</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
