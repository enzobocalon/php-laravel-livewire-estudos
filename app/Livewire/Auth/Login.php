<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

/*
    boot() -> Chamado em toda requisição, logo após o componente ser instanciado e antes de qualquer outro lifecycle hook

    mount($params...) -> Chamado apenas uma vez, na primeira renderização (equivalente ao construtor). Pode receber parâmetros da rota, Blade ou binding automático

    render() -> Chamado toda vez que o componente precisa ser renderizado

    hydrate() -> Chamado em toda requisição subsequente (não na primeira), após o componente ser reidratado

    updating($property, $value) -> Chamado antes de atualizar uma propriedade
    updatingPropertyName($value) -> Versão específica para uma propriedade (ex: updatingEmail)

    updated($property, $value) -> Chamado depois de atualizar uma propriedade
    updatedPropertyName($value) -> Versão específica para uma propriedade (ex: updatedEmail)

    dehydrate() -> Chamado em toda requisição, depois do render(), antes da resposta ser enviada ao browser
*/

class Login extends Component
{
    public $email;
    public $password;

    protected $queryString = [
        'email' => ['except' => ''],
    ]; // queryString é o que aparece na url, nesse caso, quando o email for atualizado, ele vai atualizar a url com ?email=valor, e quando for vazio, ele vai remover o ?email= da url [prop => regra] (aqui basicamente como exemplo de como usar)

    public function submit() {
        // Recomendado centralizar em services, mas por simplicidade estou fazendo aqui mesmo
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ],
        [
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser um email válido',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('home.index');
        } else {
            // addError é pro livewire (adiciona na variável errors do componente/bag), withError é pro blade/laravel geral
            return $this->addError('email', 'Credenciais inválidas');
        }
    }

    public function render()
    {
        return view('auth.login');
    }
}
