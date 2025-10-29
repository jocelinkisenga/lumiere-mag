<?php

namespace App\Livewire;

use App\Models\Comment as ModelsComment;
use Livewire\Component;

class Comment extends Component
{

    public $postId;

    public $comments;

    public $description;

    public $countComment;

    protected $rules = [
        "description" => "required"
    ];
    public function mount()
    {
        $this->countComment = ModelsComment::where("post_id", $this->postId)->count();
        $this->comments = ModelsComment::where("post_id", $this->postId)->latest()->get(["description", "created_at"]);
    }
    public function render()
    {

        return view('livewire.comment');
    }

    public function store()
    {
        $this->validate();

        ModelsComment::create([
            "post_id" => $this->postId,
            "description" => $this->description
        ]);
        $this->reset_desc();
        $this->comments = ModelsComment::where("post_id", $this->postId)->latest()->get(["description", "created_at"]);
        $this->countComment = ModelsComment::where("post_id", $this->postId)->count();
    }

    private function reset_desc () {
        $this->description = "";
    }
}
