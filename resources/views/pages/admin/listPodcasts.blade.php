@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-3 mb-md-0">
                            <i class="fas fa-microphone-alt me-2 text-primary"></i>Liste des Podcasts
                        </h4>
                        
                        <a href="{{ route("podcast.create") }}" class="btn btn-primary btn-lg-block">
                            <i class="fas fa-plus me-2"></i>Nouveau Podcast
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-top-0">N.</th>
                                    <th class="border-top-0">Titre</th>
                                    <th class="border-top-0">Date d'ajout</th>
                                    <th class="border-top-0 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($podcasts as $key => $item)
                                <tr>
                                    <td class="fw-bold text-muted">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <span class="d-block text-truncate" style="max-width: 200px;">
                                            {{ $item->title }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <i class="far fa-calendar-alt me-1"></i>{{ $item->created_at }}
                                        </small>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route("podcast.delete", ["id" => $item->id]) }}" 
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('Supprimer ce podcast ?')">
                                            <i class="fas fa-trash"></i> <span class="d-none d-md-inline">Effacer</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
