<div>
    <section class="comments-section" data-aos="fade-up">
        <h3 class="section-title">Commentaires ({{ $countComment }})</h3>

        <!-- Comment Form -->
        <div class="comment-card">
            <form wire:submit.prevent="store">

                <div class="mb-3">
                    <textarea class="form-control" wire:model="description" rows="4" placeholder="Ajouter un commentaire..."></textarea>
                </div>
                <button class="btn btn-primary" type=" submit">Envoyer le commentaire</button>
            </form>
        </div>

        @foreach ($comments as $comment)
        <!-- Comment 1 -->
        <div class="comment-card">
            <div class="d-flex">
               <img src=" {{ asset("user.jpg") }}" width="60" height="60" class="comment-avatar me-3" alt="lumiere du monde">


                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Anonyme</h6>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    {{-- <p class="mb-2">{{ $comment->description }}</p>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary me-2">
                            <i class="far fa-thumbs-up"></i> 8
                        </button>
                        <button class="btn btn-sm btn-outline-secondary me-2">
                            <i class="far fa-thumbs-down"></i>
                        </button>
                        <button class="btn btn-sm btn-link text-decoration-none">Répondre</button>
                    </div> --}}
                </div>
            </div>
        </div>

        @endforeach

    </section>

</div>
