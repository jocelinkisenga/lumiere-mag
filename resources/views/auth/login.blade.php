<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Lumiere du monde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">

    <style>
        /* Personnalisation de la page de connexion */

        /* Rendre le corps de la page agréable et centrer si peu de contenu */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            /* Espace en haut */
            padding-bottom: 40px;
            /* Espace en bas */
        }

        /* Style pour le logo */
        .logo-login {
            max-width: 150px;
            /* Limiter la taille du logo pour qu'il soit élégant */
            height: auto;
            display: block;
            /* S'assurer qu'il prend sa propre ligne */
            margin: 0 auto;
            /* Centrer l'image */
        }

        /* Ajustement de la carte de connexion */
        .card {
            border-radius: 1rem;
            /* Coins plus arrondis */
            border: none;
        }

        /* Rendre le bouton principal un peu plus doux */
        .btn-primary {
            background-color: #007bff;
            /* Bleu Bootstrap standard */
            border-color: #007bff;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

    </style>
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">

                <div class="card shadow-lg p-4">
                    <div class="card-body">

                        <div class="text-center mb-4">
                            <img src="{{asset('Logo.jpg')}}" alt="Logo de l'entreprise" class="img-fluid mb-3 logo-login">

                            <h5 class="fw-bold text-dark">Ravi de vous revoir !</h5>
                            <p class="text-muted">Connectez-vous pour accéder à votre espace.</p>
                        </div>

                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required autofocus>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="/mot-de-passe-oublie" class="text-muted text-decoration-none small">Mot de passe oublié ?</a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
