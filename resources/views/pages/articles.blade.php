@extends('layouts.main')
@section('content')
    <!-- Page Header -->
    <header class="page-header">
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
            <div class="filter-section">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label for="categoryFilter" class="form-label fw-bold">Catégorie</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">Toutes les catégories</option>
                             @foreach(\App\Models\Category::limit(4)->get() as $category)
                            <option value="technologie">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="sortBy" class="form-label fw-bold">Trier par</label>
                        <select class="form-select" id="sortBy">
                            <option value="newest">Plus récents</option>
                            <option value="popular">Plus populaires</option>
                            <option value="trending">Tendances</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Recherche</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher un article...">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="row">
                @foreach ($articles as $item)

                <!-- Article 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="article-card card h-100">
                        <div class="position-relative">
                            <img src="{{ asset("storage/uploads/".$item->image) }}" class="card-img-top article-image" alt="Article 1">

                            <span class="category-badge bg-primary">{{ $item->category->title }}</span>

                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><a href="{{ route("posts.show",['title' => $item->title,'id' => $item->id]) }}"></a>{{ $item->title }}</h5>

                            <p class="card-text flex-grow-1">{{ $item->slug }}</p>

                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <div class="d-flex align-items-center">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Auteur" class="author-avatar me-2">
                                    <div>
                                        <small class="d-block">{{ $item->author }}</small>

                                        <small class="text-muted">{{ $item->created_at }}</small>

                                    </div>
                                </div>
                                <span class="reading-time">5 min</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>


    <div class="pagination-area pb-45 text-center mb-1 mt-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
             {{ $articles->links('vendor.pagination.bootstrap-4') }}
 </div>
                </div>
            </div>
        </div>
    </div>

@endsection
