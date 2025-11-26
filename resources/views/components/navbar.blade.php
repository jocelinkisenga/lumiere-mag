<header class="sticky-top main-header pt-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">

                <img src="{{ asset("logo.jpg") }}" alt="" class="img-logo">

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("posts.front") }}">Tous les articles</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("about") }}">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("contact") }}">Contact</a>
                    </li>

                </ul>

                <div class="d-flex  flex-wrap gap-3">

                    @guest
                    <a href="{{ route("login") }}" class="btn btn-primary">se connecter</a>

                    @endguest
                    @auth
                    <a href="{{ route("profile") }}" class="btn btn-primary"><span><i class="fa fa-eye"></i></span> Profile</a>


                    <form action="{{ route("logout") }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">se deconnecter</button>

                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <div class="container-fluid d-flex justify-content-between align-items-center px-3 mb-2">
        <div class="d-flex align-items-center gap-3">
            <span class="logo-text"> LM MAGAZINE</span>

            <div>
                <i class="fas fa-search text-secondary fs-5"></i>

                <form action="">
                    <input type="text" class="form-control">
                </form>
            </div>

        </div>

        <div class=""><img src="{{ asset("logo.jpg") }}" alt="" class=" img-logo"></div>




        <i class="fas fa-user text-secondary fs-5"></i>
    </div>

    <nav class="nav-scroller border-top">
        @foreach(\App\Models\Category::all() as $category)

        <a href="{{route("categorie.show",["slug" => $category->title,"id" => $category->id])}}" class="nav-link-custom text-dark">{{ $category->title }}</a>


        @endforeach
    </nav>
</header>
