<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield("title", "Lumiere du Monde Magazine | Votre source d'inspiration quotidienne")</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
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
         max-width: 160px;
         height: 58px;
         }

    </style>

    @livewireStyles
</head>
<body>
    @include("components.navbar")
    <!-- Navigation -->
    @yield("content")
    @include("components.footer")
    @livewireScripts
<script>
   // document.addEventListener('DOMContentLoaded',() => {


    const audio = document.getElementById('podcastAudio');
    const progressBar = document.getElementById('progressBar');
    const currentTime = document.getElementById('currentTime');
    const duration = document.getElementById('duration');
    const playPauseBtn = document.getElementById("playPauseBtn");

    function togglePlayPause() {

        if(audio.paused || audio.ended) {
            audio.play();
           }
           else {
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
if(!audio) return;
const newTime = audio.currentTime += seconds;

audio.currentTime = Math.max(0, Math.min(newTime, audio.duration));
    }

    audio.addEventListener('loadedmetadata', () => {
        console.log('Audio duration',audio.duration);
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
