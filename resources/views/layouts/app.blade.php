<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Dasboard</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />


    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    {{-- <link rel="stylesheet" href="{{asset('flora/css/froala_editor.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('flora/css/froala_editor.pkgd.min.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">


    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <style>
        div#editor {
            margin: auto;
            text-align: left;
        }
        
        
         /* Optimisation de la mise en page générale */
    .content-wrapper { padding: 1.5rem 1rem !important; background-color: #f8f9fa; }
    .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .card-title { font-weight: 700; text-transform: capitalize; color: #333; margin-bottom: 0.5rem; }
    
    /* Style des champs de saisie */
    .form-label { font-weight: 600; color: #555; margin-bottom: 0.5rem; display: block; }
    .form-control { 
        border-radius: 8px; 
        border: 1px solid #e0e0e0; 
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    .form-control:focus { border-color: #7d33ff; box-shadow: 0 0 0 0.2rem rgba(125, 51, 255, 0.1); }

    /* Correction de l'éditeur sur Mobile */
    .ck-editor__editable { 
        min-height: 300px !important; 
        border-bottom-left-radius: 8px !important; 
        border-bottom-right-radius: 8px !important; 
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) { border-color: #e0e0e0; }

    /* Boutons élégants */
    .btn-submit { background: #7d33ff; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; color: white; }
    .btn-submit:hover { background: #6622dd; }
    
    @media (max-width: 768px) {
        .btn-group-mobile { display: flex; flex-direction: column; gap: 10px; }
        .btn-group-mobile button { width: 100%; }
        .card-body { padding: 1.25rem; }
    }

    </style>


</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="/">Lumiere du monde </a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>

                            <i class="mdi mdi-logout me-2 text-primary">

                            </i>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item"">

                                    @csrf
                                    <button class=" btn btn-danger btn-sm">
                                <i class="fas fa-sign-out-alt"></i> se deconnecter
                                </button>
                            </form>


                        </div>
                    </li>

                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-format-line-spacing"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="assets/images/faces/face1.jpg" alt="profile" />
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                                <span class="text-secondary text-small"></span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <span class="menu-title">Articles</span>
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route("posts.index") }}">Liste des articles</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                            <span class="menu-title">categories</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">liste des articles</a>

                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                            <span class="menu-title">podcasts</span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('podcast.index') }}">liste des podcasts</a>

                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <span class="menu-title">Videos</span>
                            <i class="mdi mdi-table-large menu-icon"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.videos') }}">liste des videos</a>

                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">Auteurs</span>
                            <i class="menu-arrow"></i>
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
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-sign-out-alt"></i> se deconnecter
                            </button>
                        </form>

                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                {{-- <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer> --}}
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script>
        // (function() {

        //     new FroalaEditor('#edit', {
        //         // URL pour l'upload des images
        //         imageUploadURL: 'articles/floara',


        //         // URL pour l'upload des fichiers (documents PDF, etc.)
        //         fileUploadURL: '/froala/upload-file',

        //         // Paramètres additionnels pour passer le CSRF Token de Laravel
        //         requestHeaders: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         },

        //         // Pour forcer la réponse en JSON attendue par Froala
        //         imageUploadMethod: 'POST'
        //     });
        // })()

    </script>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart')}}/chart.umd.js') }}"></script>


    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>


    <script src="{{ asset('assets/js/misc.js')}}"></script>


    <script src="assets/js/settings.js')}}"></script>

    <script src="{{ asset('assets/js/todolist.js') }}"></script>


    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>


    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <script type="text/javascript" src="{{  asset('flora/js/froala_editor.pkgd.min.js')}}"></script>

    {{-- <script>
        // var FroalaEditor = require('froala-editor');

        // // Load a plugin.
        // require('frora/js/plugins/align.min');

        (function() {
            new FroalaEditor("#edit")
        })()

    </script> --}}

    <!-- End custom js for this page -->
    <script>
        new FroalaEditor('#edit', {
            // URL pour l'upload des images
            imageUploadURL: 'articles/floara',


            // URL pour l'upload des fichiers (documents PDF, etc.)
            fileUploadURL: '/froala/upload-file',

            // Paramètres additionnels pour passer le CSRF Token de Laravel
            requestHeaders: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },

            // Pour forcer la réponse en JSON attendue par Froala
            imageUploadMethod: 'POST'
        });

    </script>

</body>
</html>
