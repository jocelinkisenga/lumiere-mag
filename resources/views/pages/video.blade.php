@extends("layouts.main")
@section('content')
<div class="progress-bar" id="progressBar"></div>

<!-- Article Header -->
<header class="article-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark mb-3"></span>

                <h1 class="article-title" data-aos="fade-up">{{$video->title}}</h1>

                <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100"> </p>


                <div class="article-meta justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <img src=" {{ asset("user.jpg") }}" width="60" height="60" alt="Auteur" class="author-avatar">



                    <div class="text-start">
                        <div class="fw-bold">{{ $video->author }}</div>

                        <div></div>
                        <small>{{ $video->created_at }}</small>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Article Content -->
<div class="container">
    <div class="row">
        <!-- Table of Contents -->
        {{-- <div class="col-lg-3 d-none d-lg-block">
                  <div class="table-of-contents">
                      <div class="toc-title">Sommaire</div>
                      <ul class="toc-list">
                          <li><a href="#introduction" class="active">Introduction</a></li>
                          <li><a href="#impact-quotidien">Impact quotidien</a></li>
                          <li><a href="#transformation-emplois">Transformation des emplois</a></li>
                          <li><a href="#defis-ethiques">Défis éthiques</a></li>
                          <li><a href="#avenir">Perspectives d'avenir</a></li>
                          <li><a href="#conclusion">Conclusion</a></li>
                      </ul>
                  </div>
              </div> --}}

        <!-- Main Content -->
        <div class="col-lg-12">
            <article class="article-content" data-aos="fade-up">
                <div class="article-body">
                    <figure>
                                    <div class="video-card">
                                        {{-- <img src="{{ asset("storage/videos/covers/".$video->cover_video) }}" alt="Vidéo 1" class="img-fluid w-100" style="height: 300px; object-fit: cover" /> --}}
                                        <video class="embeded-responsive w-100" controlsList="nodownload" controls preload="metadata" poster="{{ asset("storage/videos/covers/".$video->cover_video) }}">
                                            <source src="{{ asset("storage/videos/".$video->video_name) }}" type="video/mp4">

                                        </video>



                        <figcaption class="text-center text-muted mt-2">{{$video->title}}</figcaption>

                    </figure>
                    <p>{!! $video->description !!}</p>


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
                            <h4>{{$video->author}}</h4>

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

