@extends("layouts.main")
@section('content')
<div class="progress-bar" id="progressBar"></div>

<!-- Article Header -->
<header class="article-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark mb-3"></span>

                <h1 class="article-title" data-aos="fade-up">{{$podcast->title}}</h1>

                <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100"> </p>


                <div class="article-meta justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <img src=" {{ asset("user.jpg") }}" width="60" height="60" alt="Auteur" class="author-avatar">



                    <div class="text-start">
                        <div class="fw-bold">{{ $podcast->author }}</div>

                        <div></div>
                        <small>{{ $podcast->created_at }}</small>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Article Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <article class="article-content" data-aos="fade-up">
                <div class="article-body">
                    <figure>
                     <div class="col-lg-12 col-md-12 mb-4" data-aos="fade-up" data-aos-delay="100">
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
                             </div> --}}
                         </div>
                     </div>




                            <figcaption class="text-center text-muted mt-2">{{$podcast->title}}</figcaption>

                    </figure>
                    <p>{!! $podcast->description !!}</p>


                </div>

                <!-- Article Actions -->
                <div class="article-actions">
                    <div class="d-flex flex-wrap gap-3">
                        {{-- <button class="action-btn">
                            <i class="far fa-heart"></i> 2
                        </button> --}}
                        {{-- <button class="action-btn">
                            <i class="far fa-bookmark"></i> Sauvegarder
                        </button> --}}
                        <button class="action-btn">
                            <i class="fas fa-share-alt"></i> Partager

                        </button>
                        <div class="tags flex gap-3 items-center ">
                            {!! $sharedButtons !!}

                        </div>

                    </div>
                    <div>
                        <span class="reading-time">
                            <i class="far fa-eye me-1"></i>
                        </span>
                    </div>
                </div>

                <!-- Tags -->


                <!-- Author Card -->
                <div class="author-card" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <img src="{{ asset("user.jpg") }}" width="60" height="60">
                        </div>
                        <div class="col-md-10">
                            <h4>{{$podcast->author}}</h4>

                            <p class="text-muted"></p>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-dark"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Comments Section -->

        </div>
    </div>
</div>
@endsection

