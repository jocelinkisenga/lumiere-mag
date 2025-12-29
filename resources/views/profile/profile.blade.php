@extends("layouts.main")
@section("content")
<style>
    .card-stat {
        background: rgb(255, 255, 255);
        border: 1px solid rgba(28, 31, 212, 0.938);
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
        backdrop-filter: blur(6px);
    }

    .card-stat h3 {
        font-weight: bold;
    }

    .highlight-card {
        background: linear-gradient(135deg, rgba(158, 145, 103, 0.1), rgba(255, 221, 85, 0.05));
        border: 1px solid rgba(44, 47, 226, 0.938);
        border-radius: 1rem;
        padding: 2rem;
    }

    .btn-premium {
        background: linear-gradient(45deg, hsl(234, 65%, 52%), #0e3dbd);
        border: none;
        color: #ffffff;
        font-weight: 600;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(28, 31, 212, 0.938);
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
    }

</style>
<div class="progress-bar" id="progressBar"></div>
<div class="container">
    <div class="row">

        <!-- Header -->
        <section class="container my-5 text-center">
            <h1 class="fw-bold">Bienvenue, {{ auth()->user()->name }} 👋</h1>
            <p class="text-secondary">Voici un aperçu de vos lectures</p>
        </section>

        @empty(!$lastSaved)
        <section class="container my-5">
            <div class="highlight-card">
                <h4><i class="bi bi-calendar-event"></i> Votre dernier article</h4>
                <p class="mt-3 fw-bold">{{ $lastSaved->title }}</p>
                <a href="{{ route("posts.show",$lastSaved->slug) }}" class="btn btn-primary mt-2">lire l'article</a>
            </div>
        </section>

        @endempty
        <!-- Prochaine réservation -->


        <!-- Dernières réservations -->
        <section class="container my-5">
            <h4 class="mb-3">Dernièrs articles enregistrés</h4>
            @foreach ($saved as $post)
            <div class="info-card">
                <div class="d-flex justify-content-between">
                    <span>{{ $post->title }}</span>
                    <a href="{{ route("posts.show",$lastSaved->slug) }}" class="btn btn-primary btn-sm"><span class="text-white">lire l'article</span></a>
                </div>
            </div>

            @endforeach

        </section>

    </div>
</div>


@endsection
