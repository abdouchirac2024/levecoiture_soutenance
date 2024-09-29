<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Booking - Multipurpose Online Booking Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})

	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link rel="stylesheet" href="css2-1?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min-1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons-1.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/flatpickr/css/flatpickr.min-1.css') }}">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

<!-- Top alert START -->
<div class="py-2 m-0 overflow-hidden text-center border-0 alert alert-warning bg-primary rounded-0 alert-dismissible fade show" role="alert">
    <p class="m-0 text-white">Voyagez sereinement ! Découvrez nos conducteurs et destinations pour des trajets partagés sécurisés.
        <a href="#" class="mb-0 btn btn-xs btn-dark ms-2">En savoir plus</a>
    </p>
    <!-- Close button -->
    <button type="button" class="p-3 btn-close btn-close-white opacity-9" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<!-- Top alert END -->

<!-- Header START -->
@include('layouts.Frontend.header')
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

@yield('content')

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer>
    <div class="container">
        <div class="py-5 mx-0 bg-dark rounded-top p-sm-5">
            <div class="text-center row g-4 align-items-center text-lg-start">
                <!-- Copyright -->
                <div class="col-lg-5">
                    <ul class="mb-0 nav list-inline text-primary-hover justify-content-center justify-content-lg-start">
                        <li class="list-inline-item"><a class="nav-link text-muted" href="#">About</a></li>
                        <li class="list-inline-item"><a class="nav-link text-muted" href="#">Policy</a></li>
                        <li class="list-inline-item"><a class="nav-link text-muted pe-0" href="#">Terms & Condition</a></li>
                    </ul>
                </div>

                <!-- Logo -->
                <div class="text-center col-lg-3">
                    <!-- Logo -->
                    <a class="d-flex align-items-center justify-content-center me-0" href="index.html-1.htm">
                        <img class="h-60px me-2" src="{{ asset('assets/images/voi.jpg') }}" alt="footer logo">
                        <span class="text-xl font-bold text-white dark:text-white">Easy Way</span>
                    </a>
                    <div class="mt-3 text-muted text-primary-hover"> Copyright ©2023 Booking. Built by <a href="https://www.webestica.com/" class="text-muted">Webestica</a>. </div>
                </div>

                <!-- Social links -->
                <div class="col-lg-4">
                    <ul class="gap-3 nav text-primary-hover hstack justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a class="text-white nav-link fs-4" href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link fs-4" href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link fs-4" href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link fs-4" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link fs-4" href="#"><i class="fab fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- Vendors -->
<script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
<script src="{{ asset('assets/vendor/flatpickr/js/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/vendor/dropzone/js/dropzone.js') }}"></script>

<!-- ThemeFunctions -->
<script src="{{ asset('assets/js/functions.js') }}"></script>

</body>
</html>
