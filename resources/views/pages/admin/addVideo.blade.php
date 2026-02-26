@extends("layouts.app")
@section("content")
<div class="content-wrapper p-2 p-md-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10 grid-margin stretch-card">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4">
                        <i class="fas fa-video me-2 text-primary"></i>Ajouter une vidéo
                    </h4>
                    
                    <form class="forms-sample" method="POST" action="{{ route("video.store") }}" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- Titre et Auteur sur la même ligne sur PC, empilés sur Mobile --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label fw-bold">Titre</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Entrez le titre de la vidéo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="author" class="form-label fw-bold">Auteur</label>
                                <input type="text" name="author" class="form-control" id="author" placeholder="Nom de l'auteur">
                            </div>
                        </div>

                        {{-- Section Fichiers --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cover_video" class="form-label fw-bold">Image de couverture</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    <input type="file" class="form-control" id="cover_video" name="cover_video">
                                </div>
                                <small class="text-muted">Format recommandé : JPG, PNG (16:9)</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="video_name" class="form-label fw-bold">Fichier Vidéo</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-file-video"></i></span>
                                    <input type="file" class="form-control" id="video_name" name="video_name">
                                </div>
                                <small class="text-muted">Format recommandé : MP4, MKV</small>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="myeditorinstance" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="description" id="myeditorinstance" rows="5"></textarea>
                        </div>

                        {{-- Boutons d'action --}}
                        <div class="d-grid d-md-flex justify-content-md-start gap-2 border-top pt-4">
                            <button type="submit" class="btn btn-primary btn-lg-block px-4">
                                <i class="fas fa-save me-2"></i>Enregistrer
                            </button>
                            <button type="reset" class="btn btn-light btn-lg-block px-4">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
