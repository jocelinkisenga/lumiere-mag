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
                    {{-- <div class="btn-group">
                        <button class="btn btn-outline-primary">Aujourd'hui</button>
                        <button class="btn btn-outline-primary active">Cette semaine</button>
                        <button class="btn btn-outline-primary">Ce mois</button>
                    </div> --}}
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
                                    <div class="stat-number">{{ \App\Models\Podcast::count()}}</div>

                                    <div class="text-muted">podcasts</div>
                                </div>
                                <div class="stat-icon bg-success bg-opacity-10 text-success">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-number">{{ \App\Models\Comment::count()}}</div>

                                    <div class="text-muted">Commentaires</div>
                                </div>
                                <div class="stat-icon bg-info bg-opacity-10 text-info">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-danger">
                                    <i class="fas fa-arrow-down"></i>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stat-number">{{ \App\Models\Video::count()}}</div>

                                    <div class="text-muted">videos</div>
                                </div>
                                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-success">
                                    <i class="fas fa-arrow-up"></i>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@endsection
