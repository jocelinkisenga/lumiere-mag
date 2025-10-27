@extends("layouts.main")
@section('content')
<div class="progress-bar" id="progressBar"></div>

<!-- Article Header -->
<header class="article-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-warning text-dark mb-3">{{$post->category->title}}</span>

                <h1 class="article-title" data-aos="fade-up">{{$post->title}}</h1>

                <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">Comment {{$post->slug}}</p>


                <div class="article-meta justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <img src=" {{ asset("user.jpg") }}" width="60" height="60" alt="Auteur" class="author-avatar">



                    <div class="text-start">
                        <div class="fw-bold">{{ $post->author }}</div>

                        <div></div>
                        <small>15 mai 2023 • 8 min de lecture</small>
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
                        <img src="{{ asset("storage/uploads/".$post->image) }}" alt="Intelligence Artificielle" class="article-image">

                        <figcaption class="text-center text-muted mt-2">{{$post->title}}</figcaption>

                    </figure>
                    <p>{{$post->description}}</p>


                </div>

                <!-- Article Actions -->
                <div class="article-actions">
                    <div class="d-flex flex-wrap gap-3">
                        <button class="action-btn">
                            <i class="far fa-heart"></i> 248
                        </button>
                        <button class="action-btn">
                            <i class="far fa-bookmark"></i> Sauvegarder
                        </button>
                        <button class="action-btn">
                            <i class="fas fa-share-alt"></i> Partager
                        </button>
                    </div>
                    <div>
                        <span class="reading-time">
                            <i class="far fa-eye me-1"></i> 12.4K vues
                        </span>
                    </div>
                </div>

                <!-- Tags -->
                <div class="tags">
                    <span class="tag">Intelligence Artificielle</span>
                    <span class="tag">Technologie</span>
                    <span class="tag">Innovation</span>
                    <span class="tag">Futur</span>
                    <span class="tag">Éthique</span>
                    <span class="tag">Société</span>
                </div>

                <!-- Author Card -->
                <div class="author-card" data-aos="fade-up">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <img src="{{ asset("user.jpg") }}" width="60" height="60">
                        </div>
                        <div class="col-md-10">
                            <h4>{{$post->author}}</h4>

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
        @livewire('comment', ['postId' => $post->id])

            <!-- Related Articles -->
            <section class="related-articles" data-aos="fade-up">
                <h3 class="section-title">Articles similaires</h3>

                <div class="row">
                    <!-- Related Article 1 -->
                    @foreach ($related as $post)
                    <div class="col-md-6 mb-4">
                        <div class="article-card card h-100">
                            <div class="position-relative">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <img src="{{ asset("storage/uploads/".$post->image) }}" class="card-img-top article-card-image" alt="{{ $post->title }}">


                                <span class="category-badge bg-primary">$post->category->title</span>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text flex-grow-1">{{ $post->slug }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <small class="text-muted">{{ $post->created_at }}</small>
                                    <span class="reading-time">6 min</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
