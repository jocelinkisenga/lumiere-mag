@extends('layouts.main')
@section('content')
<!-- Page Header -->
<header class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Tous nos Podcasts </h1>

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

        <!-- Articles Grid -->
        <div class="row">
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



                              {{-- <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary rounded p-2 me-3">
                            <i class="fas fa-microphone text-white"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Épisode 42</h5>
                            <small class="text-muted">45 min</small>
                        </div>
                    </div>
                    <h4>
                        {{ $podcast->title}}
                              </h4>
                              <p>


                                  <div class="d-flex align-items-center gap-3">
                                      <button id="playBtn" class="btn btn-success btn-sm">Play</button>
                                      <audio controlsList="nodownload" id="audio">

                                          <source src="{{ asset("storage/podcasts/".$podcast->audio_file) }}" type="audio/mpeg">

                                      </audio>

                                      <button id="pauseBtn" class="btn btn-danger btn-sm">Pause</button>

                                      <input type="range" id="progress" class="form-range w-25" value="0" step="1">
                                      <span id="time" class="text-muted small">0:00</span>
                                  </div>


                              </p>
                              <p class="text-muted">

                              </p>
                              <div class="d-flex justify-content-between align-items-center mt-4">
                                  <div class="d-flex align-items-center">
                                      <img src="{{ asset("storage/podcasts/covers/".$podcast->cover) }}" alt="Podcast host" class="author-avatar me-2" />
                                      <small>{{ $podcast->autor }}</small>

                                  </div>

                                  <button class="btn btn-primary btn-sm">
                                      <i class="fas fa-play me-1"></i> Écouter
                                  </button>
                              </div> --}
                          </div>
                      </div> --}}

    <div class="col-lg-6 mb-4">
        <div class="podcast-card">
            <div class="row align-items-center">
                <div class="col-3">
                    <img src="{{ asset("storage/podcasts/covers/".$podcast->cover) }}" alt="Podcast 1" class="podcast-cover w-100">



                </div>
                <div class="col-7">
                    <h5 class="mb-1"> <a href="{{ route("podcast.show", $podcast->slug) }}">{{ $podcast->title }}</a></h5>


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
                    {{ $podcasts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

