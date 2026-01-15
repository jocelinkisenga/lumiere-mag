@extends("layouts.app")

@section("content")
<style>
    /* Optimisation de la mise en page générale */
    .content-wrapper { padding: 1.5rem 1rem !important; background-color: #f8f9fa; }
    .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .card-title { font-weight: 700; text-transform: capitalize; color: #333; margin-bottom: 0.5rem; }
    
    /* Style des champs de saisie */
    .form-label { font-weight: 600; color: #555; margin-bottom: 0.5rem; display: block; }
    .form-control { 
        border-radius: 8px; 
        border: 1px solid #e0e0e0; 
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    .form-control:focus { border-color: #7d33ff; box-shadow: 0 0 0 0.2rem rgba(125, 51, 255, 0.1); }

    /* Correction de l'éditeur sur Mobile */
    .ck-editor__editable { 
        min-height: 300px !important; 
        border-bottom-left-radius: 8px !important; 
        border-bottom-right-radius: 8px !important; 
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) { border-color: #e0e0e0; }

    /* Boutons élégants */
    .btn-submit { background: #7d33ff; border: none; padding: 12px 30px; border-radius: 8px; font-weight: 600; color: white; }
    .btn-submit:hover { background: #6622dd; }
    
    @media (max-width: 768px) {
        .btn-group-mobile { display: flex; flex-direction: column; gap: 10px; }
        .btn-group-mobile button { width: 100%; }
        .card-body { padding: 1.25rem; }
    }
</style>

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter un article</h4>
                    <p class="card-description text-muted mb-4">Remplissez les informations ci-dessous pour publier votre contenu.</p>

                    <form class="forms-sample" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Titre de l'article</label>
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Ex: Les tendances du Web 2026">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Auteur</label>
                                <select class="form-control" name="author_id">
                                    <option value="" selected disabled>Sélectionner un auteur</option>
                                    @foreach (\App\Models\Author::get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Catégorie</label>
                                <select class="form-control" name="category_id">
                                    <option value="" selected disabled>Sélectionner une catégorie</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Image de couverture</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Tags <small class="text-muted text-lowercase">(séparés par des virgules)</small></label>
                                <input type="text" class="form-control" name="tags" placeholder="ex: technologie, culture, a la une">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Petit sommaire</label>
                                <textarea class="form-control" name="excerpt" rows="2" placeholder="Une courte introduction..."></textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Contenu de l'article</label>
                                <textarea name="description" id="edt"></textarea>
                            </div>
                        </div>

                        <div class="btn-group-mobile mt-2">
                            <button type="submit" class="btn btn-submit me-2">Enregistrer l'article</button>
                            <a href="#" class="btn btn-light" style="padding: 12px 30px; border-radius: 8px;">Annuler</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#edt'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ]
        })
        .then(editor => {
            console.log('Editor was initialized');
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
