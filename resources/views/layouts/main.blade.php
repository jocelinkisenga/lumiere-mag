
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title", "Lumiere du Monde Magazine | Votre source d'inspiration quotidienne")</title>
    <link rel="shortcut icon" href="{{ asset("l.jpg") }}" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("fontawesome/css/all.min.css") }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


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

            .whatsapp-float {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1000;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                animation: pulse 1.5s infinite;
            }
            
                .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .whatsapp-float:hover {
        background-color: #128C7E;
        color: #FFF;
        transform: scale(1.1);
        text-decoration: none;
    }

    /* Animation de pulsation pour attirer l'œil */
    .whatsapp-float::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #25d366;
        opacity: 0.5;
        z-index: -1;
        animation: pulse-whatsapp 2s infinite;
    }

    @keyframes pulse-whatsapp {
        0% { transform: scale(1); opacity: 0.5; }
        100% { transform: scale(1.6); opacity: 0; }
    }

    @media (max-width: 768px) {
        .whatsapp-float {
            width: 50px;
            height: 50px;
            bottom: 15px;
            right: 15px;
            font-size: 25px;
        }
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
        
        <a href="https://wa.me/243999528338?text=Bonjour,%20j'aimerais%20avoir%20plus%20d'informations." 
   class="whatsapp-float" 
   target="_blank">
   <i class="fa fa-whatsapp"></i> 
   <svg viewBox="0 0 32 32" style="width:30px; height:30px; fill:white;" xmlns="http://www.w3.org/2000/svg">
       <path d="M16 0c-8.837 0-16 7.163-16 16 0 2.825 0.733 5.476 2.016 7.787l-2.016 7.213 7.373-1.935c2.251 1.201 4.823 1.935 7.627 1.935 8.837 0 16-7.163 16-16s-7.163-16-16-16zm9.362 22.562c-0.388 1.092-1.938 2.003-3.13 2.254-0.819 0.171-1.89 0.304-5.485-1.185-4.594-1.903-7.559-6.561-7.788-6.864-0.229-0.303-1.866-2.484-1.866-4.74 0-2.256 1.171-3.364 1.591-3.819 0.354-0.382 0.929-0.576 1.489-0.576 0.179 0 0.342 0.009 0.489 0.015 0.437 0.019 0.65 0.045 0.935 0.731 0.354 0.85 1.209 2.946 1.314 3.159 0.106 0.213 0.177 0.461 0.035 0.742-0.142 0.281-0.213 0.456-0.426 0.701-0.213 0.245-0.448 0.546-0.638 0.732-0.212 0.208-0.433 0.434-0.187 0.856 0.246 0.422 1.093 1.804 2.348 2.922 1.613 1.439 2.973 1.884 3.395 2.096 0.422 0.212 0.67 0.177 0.918-0.106 0.248-0.283 1.062-1.238 1.346-1.662 0.283-0.424 0.567-0.354 0.956-0.212 0.389 0.142 2.478 1.168 2.903 1.38 0.425 0.213 0.708 0.319 0.814 0.5 0.106 0.181 0.106 1.045-0.282 2.137z"/>
   </svg>
</a>
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
