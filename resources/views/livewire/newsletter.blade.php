<div>
    <section class="newsletter-section" style="background-color: #0047AB">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <h3 class="mb-4">Abonnez vous à notre newsletter</h>
                    <p class="lead mb-4">
                        Recevez nos publications continuellement.
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
                                <button class="btn btn-primary btn-lg" type="submit">
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
