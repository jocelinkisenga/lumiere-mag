<div>
    <button class="action-btn" wire:click="toggleLike">
        <i class="{{$isLiked ? 'far fa-heart text-danger ' : 'far fa-heart' }}"></i> {{ $likesCount }}
    </button>

    <button class="action-btn {{$isBookmarked ? ' text-white bg-primary' : '' }}" wire:click="toggleBookmark">
        <i class="far fa-bookmark "></i> Sauvegarder

    </button>
    @if ($showPopup)
    <div class="popup alert alert-success" role="alert" id="popup">
        {{ $popupMessage }}
    </div>
    <script>
        var popup = document.getElementById('popup');

        if (popup) {
            console.log("existe")
        }

        setTimeout(() => {
            document.getElementById('popup').classList.add('fade');
            setTimeout(() => {
                document.getElementById('popup').classList.remove('show');
            }, 500);
        }, 2000);

    </script>
    @endif
</div>
