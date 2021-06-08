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
                    <a href="#" class="dropdown-toggle no-arrow active">
                        <span class="micon dw dw-house1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Data Master</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Data Master 1</a></li>
                        <li><a href="#">Data Master 2</a></li>
                        <li><a href="#">Data Master 3</a></li>
                        <li><a href="{{route('employee.index')}}">Pegawai</a></li>
                        <li><a href="{{route('customer.index')}}">Customer</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
