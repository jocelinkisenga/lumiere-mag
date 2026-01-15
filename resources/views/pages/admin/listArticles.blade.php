@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-3 mb-md-0">Liste des catégories</h4>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg-block">
                            <i class="fas fa-plus me-2"></i>Nouvel article
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Titre</th>
                                    <th class="d-none d-md-table-cell">Date ajout</th> <th class="text-center">Commentaires</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-wrap" style="min-width: 150px;">
                                        <strong>{{ $item->title }}</strong>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.comments', ['id' => $item->id]) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-comments"></i> <span class="d-none d-lg-inline">Voir</span>
                                        </a>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('post.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">
                                            <i class="fas fa-trash"></i>
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