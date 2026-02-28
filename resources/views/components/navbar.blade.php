<header class="main-header sticky-top bg-white border-bottom shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('logo.jpg') }}" alt="Logo" class="rounded-circle me-2" style="width: 45px; height: 45px; object-fit: cover;">
            <span class="logo-text fw-bold d-none d-sm-inline">LM MAGAZINE</span>
        </a>

        <div class="search-wrapper d-none d-md-block flex-grow-1 mx-4">
            <form action="" class="position-relative">
                <input type="text" class="form-control rounded-pill ps-4" placeholder="Rechercher un article...">
                <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-3 text-secondary"></i>
            </form>
        </div>

        <div class="d-flex align-items-center gap-2">
            @auth
                <a href="{{ route('profile') }}" class="btn btn-light rounded-circle p-2"><i class="fas fa-user"></i></a>
            @endauth
            
            <button class="btn btn-primary d-lg-none px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                MENU
            </button>
            
            <div class="d-none d-lg-flex gap-2">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Connexion</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                @endguest
            </div>
        </div>
    </div>

    <nav class="category-bar border-top py-1 bg-light">
        <div class="container">
            <div class="nav-scroller">
                <div class="nav d-flex justify-content-start justify-content-lg-center">
                    <a href="/" class="nav-link-custom active">Accueil</a>
                    @foreach(\App\Models\Category::all() as $category)
                        <a href="{{route('categorie.show', ['slug' => $category->title, 'id' => $category->id])}}" class="nav-link-custom">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <div class="collapse navbar-collapse bg-white p-3 border-top" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-primary" href="/">Accueil</a></li>
            <li class="nav-item"><a class="nav-link text-primary" href="{{ route('posts.front') }}">Tous les articles</a></li>
            <hr>
            @guest
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Se connecter</a></li>
            @else
                <li class="nav-item">
<form action="{{route('logout')}}" method="POST">
@csrf
<button type="submit" class="nav-link text-danger">Déconnexion</button>
</form>

</li>
            @endguest
        </ul>
    </div>
</header>
