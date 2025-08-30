<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{url('/') }}" class="brand-link">
        <!--begin::Brand Image-->
        <img src="{{url('/') }}/{{$aboutme[0]["icon"]}}" alt="KJimenez Logo" class="brand-image opacity-75 shadow">
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">Portfolio CMS</span>
        <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" data-overlayscrollbars="host"><div class="os-size-observer"><div class="os-size-observer-listener"></div></div><div class="" data-overlayscrollbars-viewport="scrollbarHidden overflowXHidden overflowYScroll" tabindex="-1" style="margin-right: -16px; margin-bottom: -16px; margin-left: 0px; top: -8px; right: auto; left: -8px; width: calc(100% + 16px); padding: 8px;">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="../index.html" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Dashboard v1</p>
                    </a>
                    </li>               
                
                </ul>
            </li>
            
            
           
            <li class="nav-header">DOCUMENTATIONS</li>
            
            <li class="nav-item">
            <a href="{{url('/') }}" class="nav-link">
                <i class="nav-icon bi bi-house-door"></i>
                <p>Home</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{url('/aboutme') }}" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-person"></i>
                <p>About Me</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{url('/education') }}" class="nav-link">
                <i class="nav-icon bi bi-backpack2"></i>
                <p>Education</p>
            </a>
            </li>    
            <li class="nav-item">
            <a href="{{url('/experience') }}" class="nav-link">
                <i class="nav-icon bi bi-award"></i>
                <p>Experience</p>
            </a>
            </li>  
            <li class="nav-item">
            <a href="{{url('/projects') }}" class="nav-link">
                <i class="nav-icon bi bi-card-checklist"></i>
                <p>Projects</p>
            </a>
            </li>       
             <li class="nav-item">
            <a href="{{url('/admin') }}" class="nav-link">
                <i class="nav-icon bi bi-people"></i>
                <p>Admin Users</p>
            </a>
            </li>                    
            <li class="nav-item">
            <a href="{{substr(url('/'),0,-11) }}" class="nav-link" target="_blank">
                <i class="nav-icon bi bi-globe"></i>
                <p>Go to the Site</p>
            </a>
            </li> 
           
        </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div><div class="os-scrollbar os-scrollbar-horizontal os-theme-light os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden" style="--os-viewport-percent: 1; --os-scroll-direction: 0;"><div class="os-scrollbar-track"><div class="os-scrollbar-handle"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-theme-light os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-visible os-scrollbar-cornerless os-scrollbar-auto-hide-hidden" style="--os-viewport-percent: 0.8905; --os-scroll-direction: 0;"><div class="os-scrollbar-track"><div class="os-scrollbar-handle"></div></div></div></div>
    <!--end::Sidebar Wrapper-->
</aside>