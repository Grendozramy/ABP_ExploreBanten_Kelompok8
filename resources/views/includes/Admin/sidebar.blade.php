<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard')}}">
        <div class="sidebar-brand-text mx-3">Explore Banten Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard')}}">
            <i class="fa-solid fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajamen Data
    </div>

     <!-- Nav Item - Categories -->
     <li class="nav-item active">
        <a class="nav-link" href="{{ route('category.index')}}">
            <i class="fas fa-solid fa-align-justify"></i>
            <span>Categories</span></a>
    </li>
     <!-- Nav Item - Places -->
     <li class="nav-item active">
        <a class="nav-link" href="{{ route('place.index')}}">
            <i class="fa-solid fa-location-dot"></i>
            <span>Places</span></a>
    </li>
     <!-- Nav Item - Sliders -->
     <li class="nav-item active">
        <a class="nav-link" href="{{ route('slider.index')}}">
            <i class="fa-solid fa-images"></i>
            <span>Sliders</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Users -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index')}}">
            <i class="fa-solid fa-user"></i>
            <span>Users (Admin)</span></a>
    </li>
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>