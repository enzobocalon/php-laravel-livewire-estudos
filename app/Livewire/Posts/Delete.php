<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Delete extends Component
{
    public $channel = 'home';
    public $postId;

    public function delete($postId) {
        $post = Post::findOrFail($postId);
        if ($post->user_id !== auth()->id()) {
            $this->dispatch('notify-' . $this->channel, type: 'error', message: 'Você não pode apagar esta postagem.');
            $this->dispatch('close-delete-modal');
            return;
        }
        $post->delete($post->id);
        $this->dispatch('close-delete-modal');
        $this->dispatch('notify-' . $this->channel, type: 'success', message: 'Post apagado com sucesso.');
        $this->dispatch('postDeleted', $postId);
        if ($this->channel === 'detail') {
            return $this->redirectRoute('home.index');
        }
    }

    public function render()
    {
        return view('posts.delete');
    }
}
