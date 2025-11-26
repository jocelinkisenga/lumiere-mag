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
