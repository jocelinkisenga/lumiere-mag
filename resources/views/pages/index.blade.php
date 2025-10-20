@extends('layouts.main')
@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        @empty($latestPost)
        <p>pas des donnees</p>

        @else

        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge bg-warning text-dark mb-3">À la une</span>
                <h1 class="hero-title">
                    {{ $latestPost->title }}

                </h1>
                <p class="lead mb-4">
                    {{ $latestPost->slug }}

                </p>
                <div class="d-flex align-items-center">
                    <img src="{{ asset("storage/uploads/".$latestPost->image) }}" alt="Auteur" class="author-avatar me-3" />

                    <div>
                        <div>{{ $latestPost->author }}</div>

                        <small>15 mai 2023 • 8 min de lecture</small>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route("posts.show",['title' => $latestPost->title, 'id' => $latestPost->id]) }}" class="btn btn-light btn-lg me-3">Lire l'article</a>

                    <a href="#" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-play-circle me-2"></i>Écouter
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="featured-article mt-5 mt-lg-0">
                    <img src="{{ asset("storage/uploads/".$latestPost->image) }}" alt="Article à la une" class="img-fluid w-100 h-100" style="object-fit: cover" />

                    <div class="featured-content">
                        <h3>{{ $latestPost->title }}</h3>

                        <p>
                            {{ $latestPost->author }}

                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endempty
    </div>
</section>

<!-- Articles Récents -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">
            Dernières Publications
        </h2>

        <div class="row">
            @foreach ($recentPosts as $item)

            <!-- Article 1 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="article-card card h-100">
                    <div class="position-relative">
                        <img src="{{ asset("storage/uploads/".$item->image) }}" class="card-img-top article-image" alt="{{ $item->title }}" />


                        <span class="category-badge bg-primary">{{ $item->category->title }}</span>

                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                           <a href="{{ route("posts.show",['title' => $item->title, 'id' => $item->id]) }}">{{ $item->title }}</a>



                        </h5>
                        <p class="card-text flex-grow-1">
                            {{ $item->slug }}

                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <div class="d-flex align-items-center">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Auteur" class="author-avatar me-2" />
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

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="#" class="btn btn-outline-primary btn-lg">Voir tous les articles</a>
        </div>
    </div>
</section>

<!-- Podcasts Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Nos Podcasts</h2>
        <p class="lead mb-5" data-aos="fade-up" data-aos-delay="100">
            Écoutez nos discussions et interviews exclusives
        </p>

        <div class="row">
            <!-- Podcast 1 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="podcast-card">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded p-2 me-3">
                            <i class="fas fa-microphone text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Épisode 42</h5>
                            <small class="text-muted">45 min</small>
                        </div>
                    </div>
                    <h4>
                        L'écologie en entreprise : greenwashing ou réel
                        engagement ?
                    </h4>
                    <p class="text-muted">
                        Avec notre invitée spéciale, Dr. Élodie Petit,
                        experte en RSE.
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/26.jpg" alt="Podcast host" class="author-avatar me-2" />
                            <small>Claire Lemoine</small>
                        </div>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-play me-1"></i> Écouter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Podcast 2 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="podcast-card">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success rounded p-2 me-3">
                            <i class="fas fa-headphones text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Épisode 41</h5>
                            <small class="text-muted">38 min</small>
                        </div>
                    </div>
                    <h4>Les défis de l'éducation à l'ère numérique</h4>
                    <p class="text-muted">
                        Comment les nouvelles technologies transforment
                        l'apprentissage.
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Podcast host" class="author-avatar me-2" />
                            <small>Marc Bertrand</small>
                        </div>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-play me-1"></i> Écouter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Podcast 3 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="podcast-card">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning rounded p-2 me-3">
                            <i class="fas fa-podcast text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Épisode 40</h5>
                            <small class="text-muted">52 min</small>
                        </div>
                    </div>
                    <h4>L'avenir des villes intelligentes</h4>
                    <p class="text-muted">
                        Discussion avec un urbaniste sur les
                        technologies qui façonnent nos villes.
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Podcast host" class="author-avatar me-2" />
                            <small>Marie Lambert</small>
                        </div>
                        <button class="btn btn-primary btn-sm">
                            <i class="fas fa-play me-1"></i> Écouter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="#" class="btn btn-outline-primary btn-lg">Voir tous les podcasts</a>
        </div>
    </div>
</section>

<!-- Vidéos Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">
            Reportages Vidéos
        </h2>
        <p class="lead mb-5" data-aos="fade-up" data-aos-delay="100">
            Découvrez nos documentaires et reportages exclusifs
        </p>

        <div class="row">
            <!-- Vidéo 1 -->
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="video-card">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo 1" class="img-fluid w-100" style="height: 300px; object-fit: cover" />
                    <div class="video-overlay">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <h4>Dans les coulisses de la mode éthique</h4>
                        <p class="text-muted">
                            Rencontre avec des créateurs engagés pour
                            une mode durable.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small>15 min • 12K vues</small>
                            <span class="badge bg-info">Nouveau</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vidéo 2 -->
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="video-card">
                    <img src="https://images.unsplash.com/photo-1535223289827-42f1e9919769?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="Vidéo 2" class="img-fluid w-100" style="height: 300px; object-fit: cover" />
                    <div class="video-overlay">
                        <div class="play-button">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="p-3">
                        <h4>
                            L'art urbain : entre vandalisme et
                            chef-d'œuvre
                        </h4>
                        <p class="text-muted">
                            Exploration du street art à travers les rues
                            de Paris.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small>22 min • 24K vues</small>
                            <span class="badge bg-info">Populaire</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="#" class="btn btn-outline-primary btn-lg">Voir toutes les vidéos</a>
        </div>
    </div>
</section>

<!-- Articles Populaires -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">
            Les Plus Populaires
        </h2>

        <div class="row">
            @foreach ($popularPosts as $item)

            <!-- Article Populaire 1 -->
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="article-card card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset("storage/uploads/".$item->image) }}" class="img-fluid h-100 w-100" style="object-fit: cover" alt="{{ $item->title }}" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">{{ $item->category->title }}</span>

                                <h5 class="card-title">
                                <a href="{{ route("posts.show",['title' => $item->title, 'id' => $item->id]) }}">{{ $item->title }}</a>



                                </h5>
                                <p class="card-text">
                                    {{ $item->slug }}

                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">5 mai 2023 • 12 min</small>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-eye me-1"></i>
                                        24K
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
