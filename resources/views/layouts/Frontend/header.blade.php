<header class="navbar-light header-sticky">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="index.html-1.htm">
				<img class="light-mode-item navbar-brand-item" src="{{ asset('assets/images/voi.jpg') }}" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="{{ asset('assets/images/voi.jpg') }}" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="p-0 mx-3 navbar-toggler ms-auto me-xl-0 p-sm-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse collapse" id="navbarCollapse">
				<!-- Nav traveler menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item 1 Demos -->

				</ul>
				<!-- Nav traveler menu END -->

				<!-- Nav main menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item Listing -->

                    <li class="nav-item dropdown">
						<a class="nav-link" href="#" >Annonces</a>

					</li>
                    <li class="nav-item dropdown">
						<a class="nav-link" href="#" >Contact</a>

					</li>
					<!-- Nav item Pages -->


					<!-- Nav item Account -->


          <!-- Nav item link-->

				</ul>
				<!-- Nav main menu END -->
			</div>
			<!-- Main navbar END -->

			<!-- Navbar right side START -->
			<ul class="flex-row nav align-items-center list-unstyled ms-xl-auto">
				<!-- Dark mode options START -->
				<li class="nav-item dropdown me-2">
					<button class="p-0 mb-0 btn btn-link text-warning" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-circle-half theme-icon-active fa-fw" viewbox="0 0 16 16">
						<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
						<use href="#"></use>
					</svg>
					</button>

					<ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
						<li class="mb-1">
							<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
								<svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewbox="0 0 16 16">
									<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
									<use href="#"></use>
								</svg>Light
							</button>
						</li>
						<li class="mb-1">
							<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewbox="0 0 16 16">
									<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
									<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
									<use href="#"></use>
								</svg>Dark
							</button>
						</li>
						<li>
							<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewbox="0 0 16 16">
									<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
									<use href="#"></use>
								</svg>Auto
							</button>
						</li>
					</ul>
				</li>
				<!-- Dark mode options END -->

				<!-- Dropdown for user type selection -->
<li class="nav-item dropdown">
    <button class="text-white btn btn-sm dropdown-toggle rounded-pill" id="userMenu" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #4CAF50; border-color: #4CAF50;">
        S'inscrire
    </button>
    
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
        <li><a class="dropdown-item" href="{{ route('register') }}">Client</a></li>
        <li><a class="dropdown-item" href="{{ route('register') }}">Conducteur</a></li>
    </ul>
</li>

<!-- Sign In button -->
<li class="nav-item ms-2 d-none d-sm-block">
    <a href="{{ route('login') }}" class="mb-0 btn btn-sm btn-primary-soft rounded-pill"><i class="fa-solid fa-right-to-bracket me-2"></i>Se connecter</a>
</li>

			<!-- Navbar right side END -->

		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
