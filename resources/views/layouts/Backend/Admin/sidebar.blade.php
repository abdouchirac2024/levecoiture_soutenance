<nav class="navbar sidebar navbar-expand-xl navbar-light">
    <!-- Navbar brand for xl START -->
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="index.html-1.htm">
            <img class="dark-mode-item navbar-brand-item" src="{{ asset('assets/images/voi.jpg') }}" alt="logo">
			<img class="dark-mode-item navbar-brand-item" src="{{ asset('assets/images/voi.jpg') }}" alt="logo">
        </a>
    </div>
    <!-- Navbar brand for xl END -->

    <div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-body sidebar-content d-flex flex-column pt-4">

            
            <!-- Sidebar menu START -->
            <ul class="navbar-nav flex-column" id="navbar-sidebar">
                <!-- Menu item -->
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link active">Dashboard</a></li>

                <!-- Title -->
                <li class="nav-item ms-2 my-2">Pages</li>

                <!-- Menu item -->
               
                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapseguest" role="button" aria-expanded="false" aria-controls="collapseguest">
                    Utilisateurs
                    </a>
                    <!-- Submenu -->
                    <ul class="nav collapse flex-column" id="collapseguest" data-bs-parent="#navbar-sidebar">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.users') }}">Listes</a></li>
                        <!-- Nouveau lien pour la liste des clients -->
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.clients.index') }}">Clients</a></li>
                    </ul>
                </li>

                <!-- Menu item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#collapseagent" role="button" aria-expanded="false" aria-controls="collapseagent">
                   Conducteurs
                    </a>
                    <!-- Submenu -->
                    <ul class="nav collapse flex-column" id="collapseagent" data-bs-parent="#navbar-sidebar">
                 
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.drivers') }}">Listes</a></li>
                    </ul>
                </li>
                
            </ul>
            <!-- Sidebar menu end -->

            <!-- Sidebar footer START -->
            <div class="d-flex align-items-center justify-content-between text-primary-hover mt-auto p-3">

                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                  </form>
                <a class="h6 fw-light mb-0 text-body" data-bs-toggle="tooltip" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" data-bs-placement="top" aria-label="Sign out">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out
                </a>
                <a class="h6 mb-0 text-body" href="admin-settings.html.htm" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings">
                    <i class="bi bi-gear-fill"></i>
                </a>
            </div>
            <!-- Sidebar footer END -->

        </div>
    </div>
</nav>