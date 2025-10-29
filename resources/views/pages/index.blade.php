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
                    {{ Str::limit($latestPost->slug, 70) }}

                </p>
                <div class="d-flex align-items-center">
                    <img src=" {{ asset("user.jpg") }}" width="60" height="60" alt="Auteur" class="author-avatar me-3" />


                    <div>
                        <div>{{ $latestPost->author }}</div>

                        <small>{{ $latestPost->created_at }} • {{ $latestPost->reading_minutes }} min de lecture</small>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route("posts.show", $latestPost->slug) }}" class="btn btn-light btn-lg me-3">Lire l'article</a>

                    {{-- <a href="#" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-play-circle me-2"></i>Écouter
                    </a> --}}
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="featured-article mt-5 mt-lg-0">
                    <img src="{{ asset("storage/uploads/".$latestPost->image) }}" alt="Article à la une" class="img-fluid w-100 h-100" style="object-fit: cover" />

                    <div class="featured-content">
                        <h3> <a href="{{ route("posts.show", $latestPost->slug) }}">{{ $latestPost->title }}</a></h3>


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
                            <a href="{{ route("posts.show", $item->slug) }}">{{ $item->title }}</a>




                        </h5>
                        <p class="card-text flex-grow-1">
                            {!! Str::limit($item->description, 50 ) !!}

                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset("user.jpg") }}" alt="Auteur" class="author-avatar me-2" />
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
            @endforeach

        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route("posts.front") }}" class="btn btn-outline-primary btn-lg">Voir tous les articles</a>
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
            @foreach ($podcasts as $podcast)
            {{-- <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="podcast-card">

                    <div class="card shadow-sm border-0 mb-4" style="max-width: 600px;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route("podcast.show", ["title" => $podcast->title, "id" => $podcast->id]) }}">🎙️ {{ $podcast->title }}</a></h5>


            <p class="card-text text-muted">{{ $podcast->author }} </p>

            <audio id="podcastAudio" src="{{ asset("storage/podcasts/".$podcast->audio_file) }}"></audio>


            <div class="d-flex align-items-center gap-3 mt-3">
                <button class="btn btn-outline-secondary btn-sm" onclick="skip(-15)">⏪ 15s</button>
                <button class="btn btn-primary btn-sm" id="playPauseBtn" onclick="togglePlayPause()">▶️</button>
                <button class="btn btn-outline-secondary btn-sm" onclick="skip(15)">⏩ 15s</button>
            </div>

            <div class="mt-3">
                <input type="range" id="progressBar" class="form-range" value="0" step="1">
                <div class="d-flex justify-content-between">
                    <small id="currentTime">0:00</small>
                    <small id="duration">0:00</small>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div> --}}
    <div class="col-lg-6 mb-4">
        <div class="podcast-card">
            <div class="row align-items-center">
                <div class="col-3">
                    <img src="{{ asset("storage/podcasts/covers/".$podcast->cover) }}" alt="Podcast 1" class="podcast-cover w-100">



                </div>
                <div class="col-7">
                    <h5 class="mb-1"><a href="{{ route("podcast.show",$podcast->slug) }}">{{ $podcast->title }}</a></h5>

                    <p class="text-muted small mb-2">{{ Str::limit($podcast->description, 50) }}</p>
                    <div class="d-flex align-items-center ">
                        <audio id="podcastAudio" src="{{ asset("storage/podcasts/".$podcast->audio_file) }}"></audio>
                        <div class="d-flex align-items-center gap-3 mt-3">
                            {{-- <button class="btn btn-outline-secondary btn-sm" onclick="skip(-15)">⏪ 15s</button> --}}
                            {{-- <button class="btn btn-primary btn-sm" id="playPauseBtn" onclick="togglePlayPause()">▶️</button> --}}
                            {{-- <button class="btn btn-outline-secondary btn-sm" onclick="skip(15)">⏩ 15s</button> --}}
                        </div>

                        <div class="mt-3">
                            <input type="range" id="progressBar" class="form-range" value="0" step="1">
                            <div class="d-flex justify-content-between">
                                <small id="currentTime">0:00</small>
                                <small id="duration">0:00</small>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-center text-muted">
                        <small class="me-3"><i class="far fa-clock me-1"></i> </small>
                        <small><i class="far fa-calendar me-1"></i> {{ $podcast->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <div class="col-2 text-end">
                    <button onclick="togglePlayPause()" class="play-button btn p-0" id="playPauseBtn">
                        ▶️

                    </button>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    </div>

    <div class="text-center mt-4" data-aos="fade-up">
        <a href="{{ route("podcast.front") }}" class="btn btn-outline-primary btn-lg">Voir tous les podcasts</a>

    </div>
    </div>
</section>

<!-- Vidéos Section -->
<section class="py-5 mt-4">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">
            Reportages Vidéos
        </h2>
        <p class="lead mb-5" data-aos="fade-up" data-aos-delay="100">
            Découvrez nos documentaires et reportages exclusifs
        </p>

        <div class="row">
            <!-- Vidéo 1 -->
            @foreach ($recentVideos as $video)
            <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="video-card">
                    {{-- <img src="{{ asset("storage/videos/covers/".$video->cover_video) }}" alt="Vidéo 1" class="img-fluid w-100" style="height: 300px; object-fit: cover" /> --}}
                    <video class="embeded-responsive w-100" controlsList="nodownload" controls preload="metadata" poster="{{ asset("storage/videos/covers/".$video->cover_video) }}">
                        <source src="{{ asset("storage/videos/".$video->video_name) }}" type="video/mp4">

                    </video>


                    {{-- <iframe src="{{ asset("storage/videos/".$video->video_name) }}" frameborder="0"></iframe> --}}



                    <div class="p-3">
                        <h4><a href="{{ route("video.show", $video->slug) }}">{{ $video->title }}</a></h4>

                        <p class="text-muted">
                            {!!  Str::limit($video->description, 50 ) !!}


                        </p>
                        <div class="d-flex justify-content-between align-items-center">


                        </div>
                    </div>
                </div>
            </div>


            @endforeach
        </div>

        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route("video.front") }}" class="btn btn-outline-primary btn-lg">Voir toutes les vidéos</a>

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
                <div class="article-card card shadow-sm border-0 mb-4">

                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset("storage/uploads/".$item->image) }}" class="img-fluid h-100 w-100" style="object-fit: cover" alt="{{ $item->title }}" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">{{ $item->category->title }}</span>

                                <h5 class="car{{ route("posts.show", $item->slug) }}">{{ $item->title }}</a>




                                </h5>
                                <p class="card-text">
                                    {!! Str::limit($item->description, 50) !!}

                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{ $item->created_at }} •{{ $item->reading_minutes }} min</small>

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
