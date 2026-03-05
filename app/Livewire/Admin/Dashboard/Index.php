<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin', ['renderTitle' => 'Lista de Postagens'])]
#[Title('Admin | Dashboard')]
class Index extends Component
{
    public function render()
    {
        return view('admin.dashboard.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }
}
