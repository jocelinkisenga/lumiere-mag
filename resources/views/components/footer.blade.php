<!-- Newsletter -->
<section class="newsletter-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h2 class="mb-4">Restez informé</h2>
                <p class="lead mb-4">
                    Recevez chaque semaine une sélection de nos
                    meilleurs articles, podcasts et vidéos directement
                    dans votre boîte mail.
                </p>

                <form class="row g-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg" placeholder="Votre adresse email" />
                            <button class="btn btn-warning btn-lg" type="submit">
                                S'abonner
                            </button>
                        </div>
                        <div class="form-text text-light mt-2">
                            En vous abonnant, vous acceptez notre
                            politique de confidentialité.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h3 class="mb-3">
                    <span style="color: var(--accent)">Mag</span>azine
                </h3>
                <p class="mb-4">
                    Votre source d'informations, d'inspiration et de
                    découvertes. Des contenus de qualité pour les
                    esprits curieux.
                </p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                <h5 class="mb-3">Rubriques</h5>
                <ul class="list-unstyled">
                     @foreach(\App\Models\Category::limit(4)->get() as $category)

                    <li class="mb-2">
                        <a href="{{route("categorie.show",["slug" => $category->title,"id" => $category->id])}}" class="text-light text-decoration-none">{{$category->title}}</a>


                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                <h5 class="mb-3">Contenus</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route("posts.front") }}" class="text-light text-decoration-none">Articles</a>

                    </li>
                    <li class="mb-2">
                        <a href="{{ route("podcast.front") }}" class="text-light text-decoration-none">Podcasts</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route("video.front") }}" class="text-light text-decoration-none">Vidéos</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Newsletter</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Archives</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4">
                <h5 class="mb-3">À propos</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Équipe</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Contact</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Partenariats</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">Mentions légales</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">CGU</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="divider my-5"></div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">
                    &copy; 2023 Lumiere Du monde Magazine. Tous droits réservés.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light text-decoration-none me-3">Politique de confidentialité</a>
                <a href="#" class="text-light text-decoration-none">Paramètres des cookies</a>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<div class="scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Custom JS -->
<script>
    // Initialize AOS
    AOS.init({
        duration: 800
        , easing: "ease-in-out"
        , once: true
    , });

    // Navbar scroll effect
    window.addEventListener("scroll", function() {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }

        // Scroll to top button
        const scrollButton = document.querySelector(".scroll-to-top");
        if (window.scrollY > 300) {
            scrollButton.classList.add("active");
        } else {
            scrollButton.classList.remove("active");
        }
    });

    // Scroll to top functionality
    document
        .querySelector(".scroll-to-top")
        .addEventListener("click", function() {
            window.scrollTo({
                top: 0
                , behavior: "smooth"
            , });
        });

</script>


