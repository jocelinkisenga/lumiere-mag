<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    
    <style>
        div#editor { margin: auto; text-align: left; }
        .content-wrapper { padding: 1.5rem 1rem !important; background-color: #f8f9fa; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .card-title { font-weight: 700; text-transform: capitalize; color: #333; margin-bottom: 0.5rem; }
        .form-control:focus { border-color: #7d33ff; box-shadow: 0 0 0 0.2rem rgba(125, 51, 255, 0.1); }
        .btn-submit { background: #7d33ff; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; color: white; }

        /* Custom Driver.js style to match your dashboard */
        .driver-popover.driverjs-theme {
            background-color: #ffffff;
            color: #212529;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .driver-popover-title { font-weight: 700 !important; color: #7d33ff !important; }
    </style>
</head>
<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="/">Lumiere du monde </a>
                <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('logo.jpg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown" id="profile-zone">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-sign-out-alt"></i> se deconnecter
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas" id="mobile-menu-button">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="assets/images/faces/face1.jpg" alt="profile" />
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    
                    <li class="nav-item" id="tour-articles">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <span class="menu-title">Articles</span>
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('posts.index') }}">Liste des articles</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('podcast.index') }}"><i class="fas fa-podcast"></i> Podcasts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.videos') }}"><i class="fas fa-video"></i> Videos</a></li>
            
                    <li class="nav-item" id="tour-categories">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                            <span class="menu-title">categories</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">liste des catégories</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item" id="tour-authors">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">Auteurs</span>
                            <i class="mdi mdi-lock menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('authors.index') }}"> liste des auteurs </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subscribers.index') }}">
                            <span class="menu-title">Abonnes</span>
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                     @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
 

    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
  

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const driver = window.driver.js.driver;
            const isMobile = window.innerWidth < 992;

            const steps = [];

            // 1. Étape de bienvenue
            steps.push({
                element: '.navbar-brand',
                popover: {
                    title: 'Bienvenue 💡',
                    description: 'Découvrez comment gérer votre plateforme Lumière du Monde.',
                    position: 'bottom'
                }
            });

            // 2. Étape Mobile pour ouvrir la sidebar
            if (isMobile) {
                steps.push({
                    element: '#mobile-menu-button',
                    popover: {
                        title: 'Le Menu 📱',
                        description: 'Cliquez ici pour accéder à vos outils de gestion.',
                        position: 'bottom'
                    }
                });
            }

            // 3. Étapes de la Sidebar
            steps.push(
                {
                    element: '#tour-categories',
                    popover: {
                        title: 'Catégories',
                        description: 'Créez vos thématiques ici (Santé, Famille, etc.).',
                        position: isMobile ? 'bottom' : 'right'
                    }
                },
                {
                    element: '#tour-authors',
                    popover: {
                        title: 'Auteurs',
                        description: 'Gérez vos rédacteurs avant de publier.',
                        position: isMobile ? 'bottom' : 'right'
                    }
                },
                {
                    element: '#tour-articles',
                    popover: {
                        title: 'Articles',
                        description: 'C\'est ici que vous publiez vos contenus finaux.',
                        position: isMobile ? 'bottom' : 'right'
                    }
                }
            );

            const driverObj = driver({
                showProgress: true,
                animate: true,
                nextBtnText: 'Suivant',
                prevBtnText: 'Précédent',
                doneBtnText: 'Terminer',
                onHighlightStarted: (element, step) => {
                    // Si on arrive sur une étape de sidebar sur mobile, on force l'ouverture
                    if (isMobile && element.closest('#sidebar')) {
                        document.querySelector('.sidebar-offcanvas').classList.add('active');
                    }
                },
                steps: steps
            });

            // Lancement une seule fois
            if (!localStorage.getItem('dashboard_v1_onboarded')) {
                driverObj.drive();
                localStorage.setItem('dashboard_v1_onboarded', 'true');
            }
        });
    </script>
</body>
</html>
