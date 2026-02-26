<?php

namespace App\Livewire\Posts;

use App\Livewire\Home\Index;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class Modal extends Component
{
    public ?Post $post = null;

    public $title;
    public $image_path;
    public $content;

    public function handleSubmit() {
        if (!isset($this->post)) {
            $this->validate([
                'title' => 'required|string|max:255',
                'image_path' => 'nullable|string|max:255',
                'content' => 'required|string',
            ]);

            $post = Post::create([
                'title' => $this->title,
                'slug' => Str::slug($this->title), // gerar slug automático
                'image_path' => $this->image_path,
                'content' => $this->content,
                'user_id' => auth()->id(),
            ]);

            $this->reset(['title', 'image_path', 'content']);
            $this->dispatch('postCreated', $post->id);
            $this->dispatch('close-modal'); // close-modal é o nome do evento no x-on
        }
    }
    public function render()
    {
        return view('posts.modal');
    }
}
