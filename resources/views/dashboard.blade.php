@extends('layouts.app')
@section('content')
@php


use App\Models\Category;
@endphp


{{-- ok --}}
            <!-- dashboard-content.html -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">Tableau de Bord</h1>
                    <div class="btn-group">
                        <button class="btn btn-outline-primary">Aujourd'hui</button>
                        <button class="btn btn-outline-primary active">Cette semaine</button>
                        <button class="btn btn-outline-primary">Ce mois</button>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-number">{{ \App\Models\Post::count()}}</div>

                                    <div class="text-muted">Articles</div>
                                </div>
                                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> {{ \App\Models\Category::count()}} categories

                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-number">{{ \App\Models\ViewPost::count()}}</div>

                                    <div class="text-muted">visites</div>
                                </div>
                                <div class="stat-icon bg-success bg-opacity-10 text-success">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 8.3% vs mois dernier
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-number">2.4K</div>
                                    <div class="text-muted">Commentaires</div>
                                </div>
                                <div class="stat-icon bg-info bg-opacity-10 text-info">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-danger">
                                    <i class="fas fa-arrow-down"></i> 3.2% vs semaine dernière
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-number">845</div>
                                    <div class="text-muted">Abonnés newsletter</div>
                                </div>
                                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i> 15.7% ce mois
                                </small>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Recent Activity & Top Content -->
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="table-card">
                            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Activité récente</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">Voir tout</a>
                            </div>
                            <div class="p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-2">
                                                <i class="fas fa-plus text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">Nouvel article publié</div>
                                            <small class="text-muted">"L'avenir de l'IA" par Marie Lambert</small>
                                            <div class="text-muted small">Il y a 2 heures</div>
                                        </div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                                <i class="fas fa-comment text-success"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">Nouveau commentaire</div>
                                            <small class="text-muted">Sur "Les villes intelligentes"</small>
                                            <div class="text-muted small">Il y a 4 heures</div>
                                        </div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="bg-info bg-opacity-10 rounded-circle p-2">
                                                <i class="fas fa-user text-info"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">Nouvel utilisateur</div>
                                            <small class="text-muted">Pierre Martin s'est inscrit</small>
                                            <div class="text-muted small">Il y a 6 heures</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="table-card">
                            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Contenu populaire</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">Voir tout</a>
                            </div>
                            <div class="p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="rounded" width="50" height="50" alt="Article">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">Les innovations technologiques</div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">12.4K vues</small>
                                                <span class="badge bg-success">Publié</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="rounded" width="50" height="50" alt="Article">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">Cinémas indépendants</div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">8.7K vues</small>
                                                <span class="badge bg-success">Publié</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="rounded" width="50" height="50" alt="Article">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="fw-bold">Le télétravail</div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">7.2K vues</small>
                                                <span class="badge bg-success">Publié</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
