@extends("layouts.app")
@section("content")
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-plus-circle text-primary me-2 fs-4"></i>
                        <h4 class="card-title mb-0">Ajouter un Podcast</h4>
                    </div>

                    <form class="forms-sample" method="POST" action="{{ route("podcast.store") }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label fw-bold">Titre du podcast</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Ex: Les secrets du code" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="author" class="form-label fw-bold">Auteur</label>
                                <input type="text" name="author" class="form-control" id="author" placeholder="Nom de l'intervenant" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cover" class="form-label fw-bold">Image de couverture</label>
                                <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                                <div class="form-text">Format recommandé : JPG ou PNG (carré)</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="audio_file" class="form-label fw-bold">Fichier audio</label>
                                <input type="file" class="form-control" id="audio_file" name="audio_file" accept="audio/mp3,audio/wav">
                                <div class="form-text">Format accepté : MP3, WAV</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="myeditorinstance" class="form-label fw-bold">Description détaillée</label>
                            <textarea class="form-control" name="description" id="myeditorinstance" rows="8" placeholder="Décrivez le contenu de votre podcast ici..."></textarea>
                        </div>

                        <div class="d-grid d-md-flex justify-content-md-start gap-2 border-top pt-4">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fas fa-save me-2"></i>Enregistrer le podcast
                            </button>
                            <a href="{{ url()->previous() }}" class="btn btn-light px-4">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
