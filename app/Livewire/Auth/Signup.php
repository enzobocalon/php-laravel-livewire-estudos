<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Signup extends Component
{
    public $name;
    public $email;
    public $password;

    public function submit() {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ],
        [
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser um email válido',
            'email.unique' => 'O email já está em uso',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
        ]
        );
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return $this->redirectRoute('auth.login');
    }

    public function render()
    {
        return view('auth.signup');
    }
}
