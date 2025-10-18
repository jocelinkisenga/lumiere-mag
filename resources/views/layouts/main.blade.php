<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Lumière du monde-magazine</title>
        <meta name="description" content="lumière du monde magazine est une plateforme qui vous tiens au courant de toutes les informations du monde entier">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="Logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/ticker-style.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style>
/* --- 1. Variables Globales (Optionnel) --- */
:root {
    --primary-color: #CC0000; /* Rouge typique pour les médias d'info */
    --secondary-color: #333333;
    --background-color: #FFFFFF;
    --text-color: #111111;
}

/* --- 2. Style de la Barre de Navigation --- */
.navbar-media {
    width: 100%;
    background-color: var(--background-color);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-top: 4px solid var(--primary-color); /* Bande de couleur distinctive */
}

.navbar-container {
    max-width: 1200px; /* Largeur maximale pour le contenu */
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 70px;
}

/* --- 3. Style du Logo --- */
.navbar-logo {
    text-decoration: none;
    font-size: 1.8em;
    font-weight: 700;
    color: var(--secondary-color);
}
.navbar-logo .logo-text {
    border-left: 5px solid var(--primary-color);
    padding-left: 8px;
    line-height: 1;
}


/* --- 4. Style des Liens de Navigation (Desktop) --- */
.navbar-links ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar-links li {
    margin: 0 15px;
}

.navbar-links a {
    text-decoration: none;
    color: var(--text-color);
    font-size: 0.95em;
    font-weight: 600;
    padding: 10px 0;
    transition: color 0.2s, border-bottom 0.2s;
    border-bottom: 3px solid transparent; /* Pour la transition 'hover' propre */
}

.navbar-links a:hover,
.navbar-links a.active {
    color: var(--primary-color);
    border-bottom: 3px solid var(--primary-color);
}

/* --- 5. Style des Actions (Recherche & Toggle) --- */
.navbar-actions {
    display: flex;
    align-items: center;
}

.search-btn {
    background: none;
    border: none;
    color: var(--secondary-color);
    font-size: 1.2em;
    cursor: pointer;
    margin-right: 15px;
    padding: 5px;
    transition: color 0.2s;
}

.search-btn:hover {
    color: var(--primary-color);
}

.menu-toggle {
    display: none; /* Caché par défaut sur grand écran */
    background: none;
    border: none;
    font-size: 1.5em;
    color: var(--secondary-color);
    cursor: pointer;
}
.img-logo{
max-width:180px;
height : auto;
}

/* --- 6. R&eacute;activit&eacute; (Mobile & Tablette) --- */
@media (max-width: 900px) {
.img-logo{
max-width:160px;
height : 58px;
}
    /* Afficher le bouton menu */
    .menu-toggle {
        display: block;
    }

    /* Masquer la navigation par d&eacute;faut */
    .navbar-links {
        position: absolute;
        top: 70px; /* Sous la barre de navigation */
        left: 0;
        width: 100%;
        background-color: var(--background-color);
        box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
        z-index: 1000;
    }

    /* Afficher la navigation lorsque la classe 'open' est pr&eacute;sente */
    .navbar-links.open {
        max-height: 500px; /* Taille suffisante pour tous les liens */
    }

    .navbar-links ul {
        flex-direction: column; /* Les liens s'empilent verticalement */
        padding: 10px 0;
    }

    .navbar-links li {
        margin: 0;
        border-bottom: 1px solid #eee;
    }

    .navbar-links a {
        display: block; /* Prend toute la largeur */
        padding: 15px 20px;
        border-bottom: none;
    }

    .navbar-links a:hover,
    .navbar-links a.active {
        border-bottom: none;
        background-color: #f5f5f5;
    }
}

</style>



   </head>

   <body>

    <header class="navbar-media bg-primary">
    <div class="navbar-container">
        <a href="/" class="navbar-logo">
            <img src="{{asset("Logo.jpg")}}" alt="LM Magazine" class="img-logo">
        </a>

        <nav class="navbar-links" id="main-nav">
            <ul>
                <li><a href="/">Accueil</a></li>
@foreach(\App\Models\Category::limit(4)->get() as $category)

                <li><a href="{{route("categorie.show",["slug" => $category->title,"id" => $category->id])}}">{{$category->title}}</a></li>
           @endforeach    
                <li><a href="{{route('about')}}">À propos</a></li>
                <li><a href="{{route('contact')}}" class="">contactez-nous</a></li>
            </ul>
        </nav>

        <div class="navbar-actions">
            
            <button class="menu-toggle text-white" aria-label="Ouvrir le menu" aria-expanded="false">
                &#9776; </button>
        </div>
    </div>
</header>

      

    <main>

        @yield('content')
       </main>

<footer class="bg-primary text-light mt-5 pt-3 pb-0">
    <div class="container">
        <div class="row d-none d-md-flex">
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3 text-white">LUMIERE DU MONDE MAGAZINE</h6>
                <p class="small text-white-50">L'information en continu, partout dans le monde.</p>
                <div class="social-icons">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3">NAVIGATION</h6>
                <ul class="list-unstyled">
                    <li><a href="/politique" class="text-white-50 text-decoration-none small">Politique</a></li>
                    <li><a href="/economie" class="text-white-50 text-decoration-none small">Économie</a></li>
                    <li><a href="/culture" class="text-white-50 text-decoration-none small">Culture</a></li>
                    <li><a href="/contact" class="text-white-50 text-decoration-none small">Nous contacter</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3">RESTEZ INFORMÉ</h6>
                <form action="#" method="POST" class="mb-3">
                    <div class="input-group">
                        <input type="email" class="form-control form-control-sm" placeholder="Votre email">
                        <button class="btn btn-warning btn-sm" type="submit">S'inscrire</button>
                    </div>
                </form>
                <p class="small">
                    <a href="/mentions-legales" class="text-white-50 me-2 text-decoration-none">Mentions Légales</a> | 
                    <a href="/confidentialite" class="text-white-50 text-decoration-none">Confidentialité</a>
                </p>
            </div>
        </div>
        
        <div class="row d-md-none" id="footerAccordion">

            <div class="col-12 text-center mb-3 pt-2">
                <h5 class="fw-bold mb-1 text-white">
LUMIERE DU MONDE MAGAZINE    </h5>
                <p class="small text-white-50 mb-2">Restez informé, où que vous soyez.</p>
                <form action="#" method="POST" class="d-flex justify-content-center mb-3">
                    
                </form>
            </div>
            
            <div class="col-12 accordion-item bg-primary border-0 border-top border-bottom border-secondary">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-primary text-light py-2 px-0 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNav" aria-expanded="false" aria-controls="collapseNav">
                        LIENS UTILES ET CATEGORIES
                    </button>
                </h2>
                <div id="collapseNav" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                    <div class="accordion-body p-0">
                        <ul class="list-unstyled pt-1 pb-2">
@foreach(\App\Models\Category::all() as $category)
                            <li class="my-1"><a href="{{route("categorie.show",["slug" => $category->title, "id" => $category->id])}}" class="text-white-50 text-decoration-none small">{{$category->title}}</a></li>
   @endforeach                        
                            <li class="my-1"><a href="{{route("contact")}}" class="text-white-50 text-decoration-none small">Nous contacter</a></li>
 <li class="my-1"><a href="{{route("about")}}" class="text-white-50 text-decoration-none small">A propos de nous</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 accordion-item bg-primary border-0 border-bottom border-secondary">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-primary text-light py-2 px-0 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLegal" aria-expanded="false" aria-controls="collapseLegal">
                        INFORMATIONS LÉGALES
                    </button>
                </h2>
                <div id="collapseLegal" class="accordion-collapse collapse" data-bs-parent="#footerAccordion">
                    <div class="accordion-body p-0">
                        <ul class="list-unstyled pt-1 pb-2">
                            <li class="my-1"><a href="/mentions-legales" class="text-white-50 text-decoration-none small">Mentions Légales</a></li>
                            <li class="my-1"><a href="/confidentialite" class="text-white-50 text-decoration-none small">Politique de Confidentialité</a></li>
                            <li class="my-1"><a href="/cgu" class="text-white-50 text-decoration-none small">Conditions Générales d'Utilisation</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center py-2">
                <div class="social-icons mb-2">
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-12 text-center border-top border-secondary py-2">
                <p class="mb-0 small text-white-50">
                    &copy; 2025 LUMIERE DU MONDE. Tous droits réservés.
                </p>
            </div>
        </div>

    </div>
</footer>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.getElementById('main-nav');

    menuToggle.addEventListener('click', function() {
        // Basculer la classe 'open' sur la liste des liens
        mainNav.classList.toggle('open');
        
        // Mettre à jour l'attribut ARIA pour l'accessibilité
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
        menuToggle.setAttribute('aria-expanded', !isExpanded);
    });
});
</script>
	<!-- JS here -->

		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="./assets/js/jquery.ticker.js"></script>
        <script src="./assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

		<!-- Jquery Plugins, main Jquery -->
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>



    </body>
</html>
