@extends("layouts.app")

@section("content")
<style>
    /* Design global et aéré */
    .content-wrapper { padding: 1.5rem 1rem !important; background-color: #f4f7f6; }
    .card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    
    /* Barre de progression */
    .step-indicator { display: flex; justify-content: center; gap: 40px; margin-bottom: 30px; }
    .step { text-align: center; font-weight: 600; color: #adb5bd; transition: 0.3s; }
    .step.active { color: #7d33ff; }
    .step-number { 
        width: 35px; height: 35px; line-height: 31px; border: 2px solid #dee2e6; 
        border-radius: 50%; display: block; margin: 0 auto 5px; background: #fff; 
    }
    .step.active .step-number { background: #7d33ff; color: #fff; border-color: #7d33ff; }

    /* Formulaire et Steps */
    .form-step { display: none; }
    .form-step.active { display: block; animation: fadeIn 0.4s ease; }
    .form-label { font-weight: 700; color: #444; }
    .form-control { border-radius: 10px; padding: 12px; border: 1px solid #e2e8f0; }

    /* --- ZONE DE PRÉVISUALISATION --- */
    .preview-container { margin-top: 15px; position: relative; display: none; }
    #image-preview { width: 100%; max-height: 250px; object-fit: cover; border-radius: 12px; border: 2px solid #7d33ff; }

    .is-invalid { border-color: #dc3545 !important; }
    .error-msg { color: #dc3545; font-size: 0.8rem; display: none; }
    .ck-editor__editable { min-height: 500px !important; border-radius: 0 0 10px 10px !important; }

    /* Animation Pulse pour le bouton final */
    @keyframes pulse-save {
        0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(40, 167, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
    }
    .pulse-btn { animation: pulse-save 2s infinite; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 768px) { .btn-mobile { width: 100%; margin-bottom: 10px; } }
</style>

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card">
                <div class="card-body p-4">
                    
                    <div class="step-indicator">
                        <div class="step active" id="step-1-label">
                            <span class="step-number">1</span><small>Infos</small>
                        </div>
                        <div class="step" id="step-2-label">
                            <span class="step-number">2</span><small>Rédaction</small>
                        </div>
                    </div>

                    <form id="articleForm" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-step active" id="step-1">
                            <div class="row">
                                <div class="col-12 mb-3" id="tour-title">
                                    <label class="form-label">Titre de l'article *</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                    <div class="error-msg" id="err-title">Le titre est requis.</div>
                                </div>

                                <div class="col-md-6 mb-3" id="tour-author">
                                    <label class="form-label">Auteur *</label>
                                    <select class="form-control" name="author_id" id="author_id">
                                        <option value="">Sélectionner...</option>
                                        @foreach (\App\Models\Author::get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-msg" id="err-author">L'auteur est requis.</div>
                                </div>

                                <div class="col-md-6 mb-3" id="tour-category">
                                    <label class="form-label">Catégorie *</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Sélectionner...</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-msg" id="err-category">La catégorie est requise.</div>
                                </div>

                                <div class="col-md-6 mb-3" id="tour-image">
                                    <label class="form-label">Image de couverture</label>
                                    <input type="file" class="form-control" name="image" id="image-input" accept="image/*">
                                    
                                    <div class="preview-container" id="preview-box">
                                        <small class="text-muted d-block mb-1">Aperçu de la photo :</small>
                                        <img id="image-preview" src="#" alt="Aperçu">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3" id="tour-tags">
                                    <label class="form-label">Tags (séparés par des virgules)</label>
                                    <input type="text" class="form-control" name="tags" placeholder="ex: Culture, Sport, Tech">
                                </div>

                                <div class="col-12 mb-4" id="tour-excerpt">
                                    <label class="form-label">Résumé court</label>
                                    <textarea class="form-control" name="excerpt" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" id="btn-next-step" class="btn btn-primary btn-lg btn-mobile" onclick="validateStep1()">Suivant →</button>
                            </div>
                        </div>

                        <div class="form-step" id="step-2">
                            <div id="tour-editor-container">
                                <label class="form-label mb-3">Rédigez votre article ci-dessous</label>
                                <textarea name="description" id="edit"></textarea>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-light btn-lg btn-mobile" onclick="goToStep(1)">← Retour</button>
                                <button type="submit" id="btn-publish" class="btn btn-success btn-lg btn-mobile" style="background:#28a745; color:#fff; border:none;">🚀 Publier maintenant</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    <script>
    let myEditor;

    ClassicEditor
        .create(document.querySelector('#edit'), {
            // Configuration de l'adaptateur d'upload
            simpleUpload: {
                uploadUrl: "{{ route('ckeditor.upload') }}",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            },
            // Ajoute 'uploadImage' dans la barre d'outils
            toolbar: [ 
                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 
                '|', 'uploadImage', 'insertTable', 'blockQuote', 'undo', 'redo' 
            ]
        })
        .then(editor => {
            myEditor = editor;
        })
        .catch(error => {
            console.error('Erreur CKEditor:', error);
        });
</script>
<script>
    // 1. Initialisation CKEditor
   ClassicEditor.create(document.querySelector('#edit')).catch(e => console.error(e));

    // 2. LOGIQUE DE PRÉVISUALISATION DE L'IMAGE
    document.getElementById('image-input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewBox = document.getElementById('preview-box');
        const previewImage = document.getElementById('image-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewBox.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewBox.style.display = 'none';
        }
    });

    // 3. Validation et Navigation
    function validateStep1() {
        let valid = true;
        const fields = ['title', 'author_id', 'category_id'];
        
        fields.forEach(f => {
            const el = document.getElementById(f);
            const err = document.getElementById('err-' + (f.includes('_') ? f.split('_')[0] : f));
            if(!el.value.trim()) {
                el.classList.add('is-invalid');
                err.style.display = 'block';
                valid = false;
            } else {
                el.classList.remove('is-invalid');
                err.style.display = 'none';
            }
        });

        if(valid) goToStep(2);
    }

    function goToStep(step) {
        document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
        document.getElementById('step-' + step).classList.add('active');
        
        if(step === 2) {
            document.getElementById('step-2-label').classList.add('active');
        } else {
            document.getElementById('step-2-label').classList.remove('active');
        }
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // 4. ONBOARDING DRIVER.JS
    window.addEventListener('load', function() {
        const driver = window.driver.js.driver;

        const driverObj = driver({
            showProgress: true,
            nextBtnText: 'Suivant',
            prevBtnText: 'Précédent',
            doneBtnText: 'Compris !',
            steps: [
                {
                    element: '#tour-title',
                    popover: { title: 'Titre de l\'article', description: 'Donnez un nom percutant à votre sujet.', position: 'bottom' }
                },
                {
                    element: '#tour-author',
                    popover: { title: 'L\'Auteur', description: 'Attribuez cet article à un membre de votre équipe.', position: 'bottom' }
                },
                {
                    element: '#tour-category',
                    popover: { title: 'La Catégorie', description: 'Classez l\'article pour aider vos lecteurs à s\'y retrouver.', position: 'bottom' }
                },
                {
                    element: '#tour-tags',
                    popover: { title: 'Tags', description: 'Ajoutez des mots-clés pour le référencement (SEO).', position: 'top' }
                },
                {
                    element: '#tour-excerpt',
                    popover: { title: 'Le Résumé', description: 'Écrivez une phrase courte qui sera affichée sur la page d\'accueil.', position: 'top' }
                },
                {
                    element: '#btn-next-step',
                    popover: { title: 'Passer à la rédaction', description: 'Une fois ces infos saisies, cliquez ici pour ouvrir l\'éditeur.', position: 'top' },
                    onDeselected: () => {
                        // On force visuellement le passage au step 2 si le guide avance
                        if(document.getElementById('step-1').classList.contains('active')) goToStep(2);
                    }
                },
                {
                    element: '#tour-editor-container',
                    popover: { title: 'Votre contenu', description: 'Utilisez CKEditor pour mettre en forme votre texte et vos images.', position: 'top' }
                },
                {
                    element: '#btn-publish',
                    popover: { title: 'Mise en ligne 🚀', description: 'C\'est fini ! Publiez votre article sur le portail.', position: 'top' },
                    onHighlighted: (el) => el.classList.add('pulse-btn'),
                    onDeselected: (el) => el.classList.remove('pulse-btn')
                }
            ]
        });

        if (!localStorage.getItem('onboarding_create_post')) {
            driverObj.drive();
            localStorage.setItem('onboarding_create_post', 'true');
        }
    });
</script>
@endsection
