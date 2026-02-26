@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper p-2 p-md-4"> {{-- Espacement adapté --}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-3 p-md-4">
                        
                        {{-- En-tête : Titre et Bouton bien alignés --}}
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
                            <h4 class="card-title mb-0">
                                <i class="fas fa-movie-alt me-2 text-primary"></i>Liste des Videos
                            </h4>
                            <a href="{{ route("video.create") }}" class="btn btn-primary w-100 w-md-auto shadow-sm">
                                <i class="fas fa-plus me-2"></i>Nouvelle Vidéo
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">N°</th>
                                        <th>Titre</th>
                                        <th class="d-none d-sm-table-cell">Date ajout</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $key => $item)
                                    <tr>
                                        <td class="py-2 fw-bold text-muted">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <div class="text-wrap" style="min-width: 140px;">
                                                <span class="d-block text-dark">{{ $item->title }}</span>
                                                {{-- Rappel de date discret uniquement sur mobile --}}
                                                <small class="d-sm-none text-muted">
                                                    {{ $item->created_at->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </td>
                                        <td class="d-none d-sm-table-cell text-muted">
                                            {{ $item->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route("video.delete", ["id" => $item->id]) }}" 
                                               class="btn btn-outline-danger btn-sm px-3"
                                               onclick="return confirm('Supprimer cette vidéo ?')">
                                                <i class="fas fa-trash-alt"></i>
                                                <span class="d-none d-md-inline ms-1">Effacer</span>
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
</div>
@endsection
