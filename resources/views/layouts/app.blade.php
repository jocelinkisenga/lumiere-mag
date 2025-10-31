<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin Magazine</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tiny.cloud/1/05212pl2lik601zuc8u1kw9r5rjm0v6163l7se9rypgmh4m8/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            forced_root_block: 'p',
            forced_br_newlines: false,
            force_p_newlines: true,
            cleanup: true,
            verify_html: true,
            valid_elements: 'p,strong,em,br,ul,ol,li,blockquote,h1,h2,h3,a[href],span',
            content_style: "body { line-height: 1.6; } p { margin: 0 0 0.8em 0; }",
            toolbar_mode: 'sliding',
            mobile: {
                menubar: false,
                toolbar_mode: 'sliding',
                toolbar: ['bold italic underline | alignleft aligncenter alignright | bullist numlist | undo redo']
            }
        });
    </script>

    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #95a5a6;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        #sidebar {
            width: var(--sidebar-width);
            background: var(--primary);
            color: white;
            height: 100vh;
            position: fixed;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        #sidebar.collapsed {
            margin-left: -var(--sidebar-width);
        }

        #sidebar .sidebar-header {
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 1.5rem;
        }

        #sidebar ul.components {
            padding: 1rem 0;
        }

        #sidebar ul li a {
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        #sidebar ul li a:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border-left-color: var(--accent);
        }

        #sidebar ul li.active > a {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--accent);
        }

        #sidebar ul li a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        #content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        #content.expanded {
            margin-left: 0;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -var(--sidebar-width);
            }

            #sidebar.active {
                margin-left: 0;
            }

            #content {
                margin-left: 0;
            }

            #content.active {
                margin-left: var(--sidebar-width);
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="brand-logo text-center">
                <a href="/"><span style="color: var(--accent);">Mag</span>azine</a>
            </div>
            <small class="text-center d-block mt-2">Administration</small>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Tableau de bord
                </a>
            </li>
            <li><a href="{{ route('posts.index') }}"><i class="fas fa-newspaper"></i> Articles</a></li>
            <li><a href="{{ route('categories.index') }}"><i class="fas fa-tags"></i> Catégories</a></li>
            <li><a href="{{ route('podcast.index') }}"><i class="fas fa-podcast"></i> Podcasts</a></li>
            <li><a href="{{ route('admin.videos') }}"><i class="fas fa-video"></i> Vidéos</a></li>
            <li><a href="newsletter.html"><i class="fas fa-envelope"></i> Newsletter</a></li>
            <li><a href="{{ route('settings') }}"><i class="fas fa-cog"></i> Paramètres</a></li>
        </ul>

        <div class="position-absolute bottom-0 start-0 end-0 p-3 border-top border-secondary">
            <div class="d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin" class="rounded-circle me-2" width="40" height="40">
                <div class="flex-grow-1">
                    <div class="small">Admin</div>
                    <div class="small text-muted">Administrateur</div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-3 mb-4">
            <div class="container-fluid">
                <button type="button" id="sidebarToggle" class="btn btn-primary">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center">
                    <div class="input-group me-3" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <div id="page-content">
            @yield('content')
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleBtn = document.getElementById('sidebarToggle');
        const toggleIcon = toggleBtn.querySelector('i');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');

            // Change icon dynamically
            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('fa-bars');
                toggleIcon.classList.add('fa-times');
            } else {
                toggleIcon.classList.remove('fa-times');
                toggleIcon.classList.add('fa-bars');
            }
        });
    </script>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
