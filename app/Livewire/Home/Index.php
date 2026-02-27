<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class Index extends Component
{
    // #[On('postCreated')]
    // public function addToList($postId) {
    //     $this->posts->prepend(Post::findOrFail( $postId ) );
    // }

    // #[On('postDeleted')]
    // public function removeFromList($postId) {
    //     $this->posts = $this->posts->reject(fn($post) => $post->id == $postId);
    // }

    // #[On('postUpdated')]
    // public function updateList($postId) {
    //     $updatedPost = Post::findOrFail($postId);
    //     $this->posts = $this->posts->map(fn($post) => $post->id == $postId ? $updatedPost : $post);
    // }

    // Não precisa manter a lógica anterior pq agora está usando o paginate, entao ele ja cuida de atualizar a lista

    #[On('postCreated')]
    #[On('postUpdated')]
    #[On('postDeleted')]
    public function refresh() {}

    public function render()
    {
        return view('home.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }
}
