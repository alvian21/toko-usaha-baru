<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="/admin/dashboard" class="dropdown-toggle no-arrow active">
                        <span class="micon dw dw-house1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Data Master</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ '/admin/supplier' }}">Data Supplier</a></li>
                        <li><a href="{{ '/admin/item' }}">Data Barang</a></li>
                        <li><a href="{{route('employee.index')}}">Pegawai</a></li>
                        <li><a href="{{route('customer.index')}}">Customer</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Data Transaksi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('safetystok.index')}}">Data Safety Stok</a></li>
                        <li><a href="{{ '/admin/finance' }}">Data Keuangan</a></li>
                        <li><a href="{{ '/admin/sales' }}">Data Penjualan</a></li>
                        <li><a href="{{ route('onlinesales.index') }}">Data Penjualan Online</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Laporan</span>
                    </a>
                    <ul class="submenu">

                        <li><a href="/admin/finance/indexlap">Laporan Laba Rugi</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
