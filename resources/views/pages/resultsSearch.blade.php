@extends('layouts.main')
@section('content')
<!-- Page Header -->
<header class="page-header mt-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Tous articles </h1>

                <p class="lead">Découvrez l'ensemble de nos publications, analyses et reportages</p>
            </div>
        </div>
    </div>
</header>

<!-- Filters & Content -->
<section class="py-5">
    <div class="container">
        <!-- Filters -->
        {{-- filter livewire --}}
     
        <!-- Articles Grid -->
        <div class="row">
            @forelse ($articles as $item)

            <!-- Article 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="article-card card h-100">
                    <div class="position-relative">
                        <img src="{{ asset("storage/uploads/".$item->image) }}" class="card-img-top article-image" alt="Article 1">

                        <span class="category-badge bg-primary">{{ $item->category->title }}</span>

                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><a href="{{ route("posts.show",$item->slug) }}">{{ $item->title }}</a></h5>

                        <p class="card-text flex-grow-1">{{ Str::limit($item->description, 70) }}</p>

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset("user.jpg") }}" alt="Auteur" class="author-avatar me-2">
                                <div>
                                    <small class="d-block">{{ $item->author }}</small>

                                    <small class="text-muted">{{ $item->created_at }}</small>

                                </div>
                            </div>
                            <span class="reading-time">{{ $item->reading_minutes }} min</span>

                        </div>
                    </div>
                </div>
            </div>
            @empty

            <div class="card">
             
                <div class="card-body">
                    <h4 class="card-title">Désolé !!! Aucun article trouvé</h4>

                    <p class="card-text">
                        <p><a href="/" class="btn btn-primary">rentrer a l'acceuil</a></p>
                    </p>

                </div>
            </div>
            
            
              
            
            @endforelse

        </div>
    </div>
</section>


@endsection

