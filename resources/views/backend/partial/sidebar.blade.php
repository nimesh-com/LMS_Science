<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Smart <sup>Science</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Modules List -->
    <ul class="nav flex-column">
        @forelse($Modules as $module)
        <li class="nav-item">
            @php
            // Prepare a safe route or URL
            $link = null;
            if (!empty($module->slug)) {
            if (Route::has($module->slug)) {
            $link = route($module->slug);
            } else {
            // If route name doesn't exist, use slug as direct URL (if it looks like a path)
            $link = url($module->slug);
            }
            }
            @endphp

            @if($link)
            <a class="nav-link" href="{{ $link }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>{{ $module->name }}</span>
            </a>
            @else
            <a class="nav-link disabled" href="#">
                <i class="fas fa-fw fa-exclamation-triangle"></i>
                <span>{{ $module->name }}</span>
            </a>
            @endif
        </li>
        @empty
        <li class="ml-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Back</span>
            </a>
        </li>
        @endforelse

    </ul>

    <!-- End Modules List -->
</ul>