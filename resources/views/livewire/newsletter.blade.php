<div>
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
                    @if (session("message"))
                    <div class="m-4">
                        <span class="alert alert-success text-success">{{ session('message') }}</span>
                    </div>
                    @endif

                    <form class="row g-3 justify-content-center" wire:submit.prevent="subscribe">

                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="email" class="form-control form-control-lg" placeholder="Votre adresse email" wire:model="email" required />
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

</div>
