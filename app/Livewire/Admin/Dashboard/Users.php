<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin', ['renderTitle' => 'Lista de Usuários'])]
#[Title('Admin | Usuários')]
class Users extends Component
{
    public function render()
    {
        return view('admin.dashboard.users', [
            'users' => User::latest()->get(),
        ]);
    }
}
