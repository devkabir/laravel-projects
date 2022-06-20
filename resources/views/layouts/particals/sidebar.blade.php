<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">





    <li class="nav-item {{ Request::is('product/*') || Request::is('product')   ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Product</span>
        </a>
        <div id="product"
             class="collapse {{ Request::is('product/*') || Request::is('product') || Request::is('product-variant') || Request::is('product-variant/*') ? 'show' : '' }}"
             aria-labelledby="headingTwo"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Option:</h6>
                <a class="collapse-item {{ url()->current() == route('product-variant.index') ? 'active' : '' }}"
                   href="{{ route('product-variant.index') }}">Variant</a>
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item {{ url()->current() == route('product.create') ? 'active' : '' }}" href="{{ route('product.create') }}">Create
                    Product</a>
                <a class="collapse-item {{ url()->current() == route('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">All
                    Product</a>
            </div>
        </div>
    </li>






    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
