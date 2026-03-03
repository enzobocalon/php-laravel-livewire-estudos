<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
    public $post;
    public function mount($slug) {
        $this->post = Post::where('slug', $slug)->firstOrFail();
        if (!$this->post) {
            abort(404);
        }
    }

    #[On('postUpdated')]
    public function refreshPost($postId) {
        if ($this->post->id == $postId) {
            $this->post->refresh();
        }
    }

    public function render()
    {
        return view('home.detail');
    }
}
