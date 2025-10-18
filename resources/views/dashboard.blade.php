@extends('layouts.app')
@section('content')
@php


use App\Models\Category;
@endphp
<div class="container">
    <h2 class="mb-4 text-center text-secondary">Aperçu du Contenu 📰</h2>
    
    <div class="row g-4 mb-5">
        
        <div class="col-md-6">
            <div class="card bg-white p-4 text-center">
                <div class="card-body">
                    <p class="card-title text-uppercase">Articles Publiés</p>
                    <h5 class="card-text card-text-big text-primary">{{ \App\Models\Post::count()}}</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card bg-white p-4 text-center">
                <div class="card-body">
                    <p class="card-title text-uppercase">Catégories Ajoutées</p>
                    <h5 class="card-text card-text-big text-success">{{ \App\Models\Category::count()}}</h5>
                </div>
            </div>
        </div>
        
    </div>

    <hr>
    
    <div class="card shadow-sm table-custom">
        <div class="card-header bg-light">
            <h5 class="mb-0 text-dark">Derniers Articles Récents</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre de l'Article</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Date de Publication</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Post::latest()->limit(10)->get() as $article)
                        <tr>
                            <th scope="row">4</th>
                            <td>{{$article->title}}</td>
                            <td>David Dubois</td>
                            <td>{{$article->created_at}}</td>
                        </tr>

@endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection