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
                          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Auteur" class="author-avatar">
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
                                  <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Auteur" class="author-avatar">
                              </div>
                              <div class="col-md-10">
                                  <h4>{{$post->author}}</h4>

                                  <p class="text-muted">Journaliste spécialisée en technologie et innovation. Passionnée par l'impact des nouvelles technologies sur la société et l'économie. Auteure de plusieurs livres sur la transformation numérique.</p>
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
                  <section class="comments-section" data-aos="fade-up">
                      <h3 class="section-title">Commentaires (12)</h3>

                      <!-- Comment Form -->
                      <div class="comment-card">
                          <form>
                              <div class="mb-3">
                                  <textarea class="form-control" rows="4" placeholder="Ajouter un commentaire..."></textarea>
                              </div>
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="notifyMe">
                                      <label class="form-check-label small" for="notifyMe">
                                          Me notifier des réponses
                                      </label>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Publier</button>
                              </div>
                          </form>
                      </div>

                      <!-- Comment 1 -->
                      <div class="comment-card">
                          <div class="d-flex">
                              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Utilisateur" class="comment-avatar me-3">
                              <div class="flex-grow-1">
                                  <div class="d-flex justify-content-between align-items-center mb-2">
                                      <h6 class="mb-0">Thomas Moreau</h6>
                                      <small class="text-muted">Il y a 2 heures</small>
                                  </div>
                                  <p class="mb-2">Excellent article qui pose les bonnes questions ! Je travaille dans le domaine de l'IA et je trouve que vous avez parfaitement saisi les enjeux éthiques. La régulation est effectivement cruciale pour éviter les dérives.</p>
                                  <div class="d-flex align-items-center">
                                      <button class="btn btn-sm btn-outline-secondary me-2">
                                          <i class="far fa-thumbs-up"></i> 8
                                      </button>
                                      <button class="btn btn-sm btn-outline-secondary me-2">
                                          <i class="far fa-thumbs-down"></i>
                                      </button>
                                      <button class="btn btn-sm btn-link text-decoration-none">Répondre</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Comment 2 -->
                      <div class="comment-card">
                          <div class="d-flex">
                              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Utilisateur" class="comment-avatar me-3">
                              <div class="flex-grow-1">
                                  <div class="d-flex justify-content-between align-items-center mb-2">
                                      <h6 class="mb-0">Sophie Martin</h6>
                                      <small class="text-muted">Il y a 5 heures</small>
                                  </div>
                                  <p class="mb-2">Merci pour cet article très complet. Je m'interroge sur l'impact de l'IA sur les inégalités sociales. Ne risque-t-elle pas d'accentuer le fossé entre ceux qui maîtrisent ces technologies et les autres ?</p>
                                  <div class="d-flex align-items-center">
                                      <button class="btn btn-sm btn-outline-secondary me-2">
                                          <i class="far fa-thumbs-up"></i> 5
                                      </button>
                                      <button class="btn btn-sm btn-outline-secondary me-2">
                                          <i class="far fa-thumbs-down"></i>
                                      </button>
                                      <button class="btn btn-sm btn-link text-decoration-none">Répondre</button>
                                  </div>

                                  <!-- Reply -->
                                  <div class="comment-card mt-3">
                                      <div class="d-flex">
                                          <img src="https://randomuser.me/api/portraits/men/76.jpg" alt="Utilisateur" class="comment-avatar me-3">
                                          <div class="flex-grow-1">
                                              <div class="d-flex justify-content-between align-items-center mb-2">
                                                  <h6 class="mb-0">Pierre Dubois</h6>
                                                  <small class="text-muted">Il y a 3 heures</small>
                                              </div>
                                              <p class="mb-2">@Sophie Martin C'est une excellente question. L'éducation et la formation continue seront essentielles pour éviter cette fracture technologique. Heureusement, l'IA peut aussi aider à personnaliser l'apprentissage !</p>
                                              <div class="d-flex align-items-center">
                                                  <button class="btn btn-sm btn-outline-secondary me-2">
                                                      <i class="far fa-thumbs-up"></i> 3
                                                  </button>
                                                  <button class="btn btn-sm btn-outline-secondary me-2">
                                                      <i class="far fa-thumbs-down"></i>
                                                  </button>
                                                  <button class="btn btn-sm btn-link text-decoration-none">Répondre</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>

                  <!-- Related Articles -->
                  <section class="related-articles" data-aos="fade-up">
                      <h3 class="section-title">Articles similaires</h3>

                      <div class="row">
                          <!-- Related Article 1 -->
                          <div class="col-md-6 mb-4">
                              <div class="article-card card h-100">
                                  <div class="position-relative">
                                      <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" class="card-img-top article-card-image" alt="Article 1">
                                      <span class="category-badge bg-primary">Technologie</span>
                                  </div>
                                  <div class="card-body d-flex flex-column">
                                      <h5 class="card-title">Comment la blockchain révolutionne la finance</h5>
                                      <p class="card-text flex-grow-1">Au-delà du Bitcoin, la technologie blockchain trouve des applications dans de nombreux secteurs.</p>
                                      <div class="d-flex justify-content-between align-items-center mt-auto">
                                          <small class="text-muted">10 mai 2023</small>
                                          <span class="reading-time">6 min</span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- Related Article 2 -->
                          <div class="col-md-6 mb-4">
                              <div class="article-card card h-100">
                                  <div class="position-relative">
                                      <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" class="card-img-top article-card-image" alt="Article 2">
                                      <span class="category-badge bg-success">Innovation</span>
                                  </div>
                                  <div class="card-body d-flex flex-column">
                                      <h5 class="card-title">Les villes intelligentes de demain</h5>
                                      <p class="card-text flex-grow-1">Comment la technologie transforme l'urbanisme et la vie en ville.</p>
                                      <div class="d-flex justify-content-between align-items-center mt-auto">
                                          <small class="text-muted">8 mai 2023</small>
                                          <span class="reading-time">7 min</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
      </div>


@endsection
