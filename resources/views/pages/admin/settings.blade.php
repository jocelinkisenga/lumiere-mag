@extends("layouts.app")
@section("content")
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Paramètres</h1>
            <p class="text-muted mb-0">Configurez les paramètres de votre magazine</p>
        </div>
        <button class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Enregistrer les modifications
        </button>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="table-card">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-globe me-2"></i>Général
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-paint-brush me-2"></i>Apparence
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-envelope me-2"></i>Email
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-shield-alt me-2"></i>Sécurité
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-plug me-2"></i>Intégrations
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-database me-2"></i>Sauvegarde
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="table-card">
                <div class="p-3 border-bottom">
                    <h5 class="mb-0">Paramètres Généraux</h5>
                </div>
                <div class="p-4">
                    <form>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom du site</label>
                                    <input type="text" class="form-control" value="Magazine">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3">Votre source d'informations, d'inspiration et de découvertes</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control">
                                    <small class="text-muted">Format recommandé: PNG, 200x50px</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Favicon</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">Informations de contact</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email de contact</label>
                                    <input type="email" class="form-control" value="contact@magazine.fr">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" value="+33 1 23 45 67 89">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="border-bottom pb-2 mb-3">Réseaux sociaux</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input type="url" class="form-control" value="https://facebook.com/magazine">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input type="url" class="form-control" value="https://twitter.com/magazine">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input type="url" class="form-control" value="https://instagram.com/magazine">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="url" class="form-control" value="https://linkedin.com/company/magazine">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection