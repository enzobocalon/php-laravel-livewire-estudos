<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Delete extends Component
{
    public $postId;

    public function delete($postId) {
        $post = Post::findOrFail($postId);
        if ($post->user_id !== auth()->id()) {
            $this->dispatch('notify-home', type: 'error', message: 'Você não pode apagar esta postagem.');
            $this->dispatch('close-delete-modal');
            return;
        }
        $post->delete($post->id);
        $this->dispatch('close-delete-modal');
        $this->dispatch('notify-home', type: 'success', message: 'Post apagado com sucesso.');
        $this->dispatch('postDeleted', $postId);
    }

    public function render()
    {
        return view('posts.delete');
    }
}
