        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-4">
            <div class="container">
                <a class="navbar-brand" href="/">
                    {{-- <span style="color: var(--accent)">LM Mag</span>azine --}}
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

                        @foreach(\App\Models\Category::limit(4)->get() as $category)

                        <li class="nav-item"><a href="{{route("categorie.show",["slug" => $category->title,"id" => $category->id])}}" class="nav-link">{{$category->title}}</a></li>

                        @endforeach

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("about") }}">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("contact") }}">Contact</a>
                        </li>

                    </ul>

                    {{-- <div class="d-flex">
                        <button class="btn btn-outline-dark me-2">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-primary">S'abonner</button>
                    </div> --}}
                </div>
            </div>
        </nav>
