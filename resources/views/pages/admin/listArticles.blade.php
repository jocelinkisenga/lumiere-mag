@extends('layouts.app')
@section('content')
<div class="content-wrapper p-2 p-md-4">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card shadow-sm border-0">
                <div class="card-body p-3 p-md-4">
                    {{-- Header responsive : Empilé sur mobile, aligné sur PC --}}
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
                        <h4 class="card-title mb-0 text-center text-md-start">
                            <i class="fas fa-newspaper me-2 text-primary"></i>Liste des articles
                        </h4>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary w-100 w-md-auto shadow-sm">
                            <i class="fas fa-plus me-2"></i>Nouvel article
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="border-0" style="width: 40px;">N°</th>
                                    <th class="border-0">Titre</th>
                                    {{-- Caché sur mobile, visible dès tablette (md) --}}
                                    <th class="border-0 d-none d-md-table-cell">Date ajout</th> 
                                    <th class="border-0 text-center">Comms</th>
                                    <th class="border-0 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $item)
                                <tr>
                                    <td class="text-muted fw-bold">{{ $key + 1 }}</td>
                                    <td>
                                        {{-- On limite la largeur sur mobile pour éviter l'explosion du tableau --}}
                                        <div class="text-wrap" style="min-width: 120px; max-width: 250px;">
                                            <span class="d-block fw-bold text-dark">{{ $item->title }}</span>
                                            {{-- Petit rappel de date uniquement sur mobile sous le titre --}}
                                            <small class="d-md-none text-muted" style="font-size: 0.75rem;">
                                                {{ $item->created_at->format('d/m/Y') }}
                                            </small>
                                        </div>
                                    </td>
                                    <td class="d-none d-md-table-cell text-muted">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.comments', ['id' => $item->id]) }}" class="btn btn-outline-success btn-sm px-3">
                                            <i class="fas fa-comments"></i>
                                            <span class="d-none d-lg-inline ms-1">Voir</span>
                                        </a>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group shadow-sm">
                                            <a href="{{ route('posts.edit', ['id' => $item->id]) }}" 
                                               class="btn btn-success btn-sm" 
                                               onclick="return confirm('Supprimer cet article ?')">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('post.delete', ['id' => $item->id]) }}" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Supprimer cet article ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
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
