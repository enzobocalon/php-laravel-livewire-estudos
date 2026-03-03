<?php

namespace App\Livewire\Posts;

use App\Livewire\Home\Index;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class CreateUpdate extends Component
{
    public $channel = 'home';
    public $postId = null;

    public $title;
    public $image_path;
    public $content;

    /*
        Na view está sendo usado o .set, enquanto o dispatch espera uma resposta do servidor
        O $wire.set ele atualiza o frontend sem depender da resposta do servidor, ou seja, é uma atualização otimista
        Ele espera que vai dar certo e ja mostra o resultado pro usuario enquanto atualiza de fundo, e o dispatch ele espera a resposta do servidor para atualizar o frontend.
    */

    #[On('edit-post')]
    public function load($id){
        $this->postId = $id;
        // Validação para garantir que o post existe e que o usuario pode editar
        $post = Post::findOrFail($id);
        if ($post->user_id !== auth()->id()) {
            $this->reset(['title', 'image_path', 'content']);
            $this->dispatch('notify-' . $this->channel, type: 'error', message: 'Você não pode editar esta postagem.');
            $this->dispatch('close-create-update-modal');
            return;
        }
        $this->title = $post->title;
        $this->image_path = $post->image_path;
        $this->content = $post->content;
        $this->dispatch('end-loading');
    }


    public function handleSubmit() {
        if (empty($this->postId)) {
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


            $this->dispatch('postCreated', $post->id);
            $this->dispatch('notify-home', type: 'success', message: 'Postagem criada com sucesso.');// é o nome do evento no x-on
        } else {
            $post = Post::findOrFail($this->postId);
            if ($post->user_id !== auth()->id()) {
                $this->dispatch('notify-' . $this->channel, type: 'error', message: 'Você não pode editar esta postagem.');
                $this->reset(['title', 'image_path', 'content']);
                $this->dispatch('close-create-update-modal');
                return;
            }
            $post->update([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'image_path' => $this->image_path,
                'content' => $this->content,
            ]);
            $this->dispatch('postUpdated', $this->postId);
            $this->dispatch('notify-' . $this->channel, type: 'success', message: 'Postagem atualizada com sucesso.');
        }
        $this->reset(['title', 'image_path', 'content']);
        $this->dispatch('close-create-update-modal');
    }
    public function render()
    {
        return view('posts.create-update');
    }
}
