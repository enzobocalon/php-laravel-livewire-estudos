<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class Index extends Component
{
    public $posts;
    public function mount() {
        $this->posts = Post::latest()->take(10)->get(); // carrega os 10 últimos
    }

    #[On('postCreated')]
    public function addToList($postId) {
        $this->posts->prepend(Post::find( $postId ) );
    }

    public function render()
    {
        return view('home.index');
    }
}
