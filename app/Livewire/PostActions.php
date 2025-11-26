<?php

namespace App\Livewire;

use App\Models\Bookmark;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostActions extends Component
{
    public Post $post;

    public bool $isLiked;
    public bool $isBookMarked;
    public $showPopup = false;
    public $popupMessage = '';

    public function mount()
    {
        $this->isLiked = $this->post->likes()->where('user_id', auth()->id())->exists();
        $this->isBookMarked = $this->post->bookmarks()->where('user_id', auth()->id())->exists();
    }
    public function toggleLike()
    {
        if (auth()->check()) {
            $like = Like::where('user_id', auth()->user()->id)->where('post_id', $this->post->id)->first();
            if ($like) {
                $like->delete();
                $this->isLiked = false;
                $this->showPopup = true;
                $this->popupMessage = "oups! vous avez retiré votre like";
            } else {
                Like::create(['post_id' => $this->post->id, "user_id" => auth()->user()->id]);
                $this->isLiked = true;
                $this->showPopup = true;
                $this->popupMessage = "Merci d'avoir aimé l'article";
            }
        } else {
            $this->showPopup = true;
            $this->popupMessage = "oups! vous devez vous connecter";
        }
    }

    public function toggleBookmark()
    {
        if (auth()->check()) {
            $bookMarked = Bookmark::where('user_id', auth()->user()->id)->where('post_id', $this->post->id)->first();
            if ($bookMarked) {
                $bookMarked->delete();
                $this->isBookMarked = false;

                $this->showPopup = true;
                $this->popupMessage = "Oups! vous venez de retirer la sauvegarde de l'article";
            } else {
                Bookmark::create(['post_id' => $this->post->id, "user_id" => auth()->user()->id]);
                $this->isBookMarked = true;

                $this->showPopup = true;
                $this->popupMessage = "vous venez de sauvegarder l'article pour lire plutard";
            }
        } else {
            $this->showPopup = true;
            $this->popupMessage = "oups! vous devez vous connecter";
        }
    }
    public function render()
    {
        return view(
            'livewire.post-actions',
            [

                'isBookmarked' => auth()->user()?->bookmarks()->where('post_id', $this->post->id)->exists(),
                'likesCount' => $this->post->likes()->count()
            ]
        );
    }
}
