<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User as UserModel;
use Illuminate\Validation\Rule;

#[Layout('layouts.admin', ['renderTitle' => 'Editando Usuário'])]
#[Title('Admin | Editar Usuário')]
class User extends Component
{
    public $userId;
    public $name;
    public $email;
    public $is_admin;
    public function mount() {
        $user = UserModel::findOrFail(request()->route('id'));
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = (bool) $user->is_admin;
    }

    public function update(){
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->userId),
            ],
            'is_admin' => ['boolean']
        ]);

        $data['is_admin'] = (bool) $this->is_admin;

        UserModel::findOrFail($this->userId)->update($data);
        $this->dispatch('notify-admin-user', message: 'Usuário atualizado com sucesso!', type: 'success');
    }

    public function delete() {
        UserModel::findOrFail($this->userId)->delete();
        return redirect()->route('admin.dashboard.users')->with('message', 'Usuário excluído com sucesso!');
    }

    public function render()
    {
        return view('admin.dashboard.user');
    }
}
