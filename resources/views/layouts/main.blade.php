<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title", "Lumiere du Monde Magazine | Votre source d'inspiration quotidienne")</title>
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("fontawesome/css/all.min.css") }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @stack('styles')
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        a {
            text-decoration: none;
        }

        .form-range {
            height: 4px;
        }

        .img-logo {
            max-width: 130px;
            height: auto;
        }

        /* --- 6. R&eacute;activit&eacute; (Mobile & Tablette) --- */
        @media (max-width: 900px) {
            .img-logo {
                max-width: 200px;
                height: 65px;
            }

    </style>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! TwitterCard::generate() !!}
    @livewireStyles
</head>
<body>

    <div class="mobile-container">

        @include("components.navbar")
        <div>

            <!-- Navigation -->
            @yield("content")
        </div>
        @include("components.footer")
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

    <script src="{{ asset("bootstrap/js/bootstrap.min.js") }}"></script>
    <script>
        // document.addEventListener('DOMContentLoaded',() => {


        const audio = document.getElementById('podcastAudio');
        const progressBar = document.getElementById('progressBar');
        const currentTime = document.getElementById('currentTime');
        const duration = document.getElementById('duration');
        const playPauseBtn = document.getElementById("playPauseBtn");

        function togglePlayPause() {

            if (audio.paused || audio.ended) {
                audio.play();
            } else {
                audio.pause();
            }
        }



        // function playAudio() {
        //     audio.play();
        // }

        // function pauseAudio() {
        //     audio.pause();
        // }

        function skip(seconds) {
            if (!audio) return;
            const newTime = audio.currentTime += seconds;

            audio.currentTime = Math.max(0, Math.min(newTime, audio.duration));
        }

        audio.addEventListener('loadedmetadata', () => {
            console.log('Audio duration', audio.duration);
            progressBar.max = audio.duration;
            duration.textContent = formatTime(audio.duration);
        });

        audio.addEventListener('timeupdate', () => {
            progressBar.value = audio.currentTime;
            currentTime.textContent = formatTime(audio.currentTime);
        });

        progressBar.addEventListener('input', () => {
            audio.currentTime = progressBar.value;
        });

        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60).toString().padStart(2, '0');
            return `${mins}:${secs}`;
        }

        audio.addEventListener('play', () => {
            playPauseBtn.innerHTML = '⏸';
            playPauseBtn.classList.remove('btn-primary');
            playPauseBtn.classList.add('btn-danger');

        })

        audio.addEventListener('pause', () => {
            playPauseBtn.innerHTML = '▶️';

            playPauseBtn.classList.remove('btn-danger');
            playPauseBtn.classList.add('btn-primary');

        })

    </script>

</body>
</html>
