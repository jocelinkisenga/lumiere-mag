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
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            transition: all 0.3s;
            z-index: 1000;
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

        #sidebar ul li.active>a {
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
            transition: all 0.3s;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border-left: 4px solid var(--accent);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .table-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .badge-published {
            background: #27ae60;
        }

        .badge-draft {
            background: #f39c12;
        }

        .badge-pending {
            background: #e74c3c;
        }

        .btn-action {
            padding: 0.25rem 0.5rem;
            margin: 0 2px;
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
                <a href="{{ route("dashboard") }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Tableau de bord
                </a>
            </li>
            <li>
                <a href="{{ route("posts.index") }}">

                    <i class="fas fa-newspaper"></i>
                    Articles
                </a>
            </li>
            <li>
                <a href="{{ route("categories.index") }}">

                    <i class="fas fa-tags"></i>
                    Catégories
                </a>
            </li>
            <li>
                <a href="{{ route("podcast.index") }}">
                    <i class="fas fa-podcast"></i>
                    Podcasts
                </a>
            </li>
            <li>
                <a href="{{ route("admin.videos") }}">
                    <i class="fas fa-video"></i>
                    Vidéos
                </a>
            </li>
            <li>
                <a href="comments.html">
                    <i class="fas fa-comments"></i>
                    Commentaires
                </a>
            </li>
            <li>
                <a href="users.html">
                    <i class="fas fa-users"></i>
                    Utilisateurs
                </a>
            </li>
            <li>
                <a href="newsletter.html">
                    <i class="fas fa-envelope"></i>
                    Newsletter
                </a>
            </li>
            <li>
                <a href="settings.html">
                    <i class="fas fa-cog"></i>
                    Paramètres
                </a>
            </li>
        </ul>

        <div class="position-absolute bottom-0 start-0 end-0 p-3 border-top border-secondary">
            <div class="d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin" class="rounded-circle me-2" width="40" height="40">
                <div class="flex-grow-1">
                    <div class="small">Admin</div>
                    <div class="small text-muted">Administrateur</div>
                </div>
                <a href="login.html" class="text-light">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-3 mb-4">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center">
                    <div class="input-group me-3" style="width: 300px;">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-bell"></i>
                            <span class="badge bg-danger">3</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Nouveau commentaire</a></li>
                            <li><a class="dropdown-item" href="#">Article en attente</a></li>
                            <li><a class="dropdown-item" href="#">Nouvel utilisateur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main content will be loaded here -->
        <div id="page-content">
            <!-- This area will be dynamically loaded with specific page content -->

            @yield("content")
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });


        // Initialize charts for dashboard
        function initializeCharts() {
            // Traffic Chart
            const trafficCtx = document.getElementById('trafficChart').getContext('2d');
            new Chart(trafficCtx, {
                type: 'line'
                , data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun']
                    , datasets: [{
                        label: 'Visiteurs'
                        , data: [12000, 19000, 15000, 25000, 22000, 30000]
                        , borderColor: '#e74c3c'
                        , backgroundColor: 'rgba(231, 76, 60, 0.1)'
                        , tension: 0.4
                        , fill: true
                    }]
                }
                , options: {
                    responsive: true
                    , plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Content Type Chart
            const contentCtx = document.getElementById('contentChart').getContext('2d');
            new Chart(contentCtx, {
                type: 'doughnut'
                , data: {
                    labels: ['Articles', 'Podcasts', 'Vidéos']
                    , datasets: [{
                        data: [65, 20, 15]
                        , backgroundColor: [
                            '#2c3e50'
                            , '#e74c3c'
                            , '#3498db'
                        ]
                    }]
                }
                , options: {
                    responsive: true
                    , plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

    </script>
    <script type="script" src="{{ asset("bootstrap/js/bootstrap.bundle.min.js") }}"></script>
</body>
</html>
