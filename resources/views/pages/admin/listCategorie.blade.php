@extends('layouts.app')
@section('content')

<div class="content-wrapper p-2 p-md-4"> {{-- Padding ajusté pour mobile --}}
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0"> {{-- Retrait bordure pour un look plus moderne --}}
                <div class="card-body p-3 p-md-4">
                    {{-- Header : Colonne sur mobile, Ligne sur PC --}}
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
                        <h4 class="card-title mb-0 text-center text-md-start">
                            <i class="fas fa-tags me-2 text-primary"></i>Liste des Catégories
                        </h4>

                        <a href="{{ route("categorie.create") }}" class="btn btn-primary w-100 w-md-auto shadow-sm">
                            <i class="fas fa-plus me-2"></i>Nouvelle Catégorie
                        </a>
                    </div>

                    {{-- Container de table optimisé --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0 text-nowrap" style="width: 50px;">#</th>
                                    <th class="border-0">Titre</th>
                                    <th class="border-0 d-none d-sm-table-cell">Date d'ajout</th> {{-- Caché sur très petits écrans --}}
                                    <th class="border-0 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $item)
                                <tr>
                                    <td class="fw-bold text-muted">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 150px;" title="{{ $item->title }}">
                                            <span class="badge bg-light text-dark border">
                                                {{ $item->title }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                        </small>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route("category.delete", ["id" => $item->id]) }}" 
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('Supprimer ?')"
                                           title="Supprimer">
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="d-none d-md-inline ms-1">Effacer</span> {{-- Texte visible uniquement sur PC --}}
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
