@extends('layouts.main')
@section('content')
<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Toutes nos videos </h1>

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
        <div class="row">
            @foreach ($videos as $video)

            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="video-card">
                    {{-- <img src="{{ asset("storage/videos/covers/".$video->cover_video) }}" alt="Vidéo 1" class="img-fluid w-100" style="height: 300px; object-fit: cover" /> --}}
                    <video class="embeded-responsive w-100" controlsList="nodownload" controls preload="metadata" poster="{{ asset("storage/videos/covers/".$video->cover_video) }}">
                        <source src="{{ asset("storage/videos/".$video->video_name) }}" type="video/mp4">

                    </video>


                    {{-- <iframe src="{{ asset("storage/videos/".$video->video_name) }}" frameborder="0"></iframe> --}}



                    <div class="p-3">
                        <h4>{{ $video->title }}</h4>
                        <p class="text-muted">
                            {{Str::limit($video->description, 50 )}}


                        </p>
                        <div class="d-flex justify-content-between align-items-center">


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
                    {{ $videos->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
