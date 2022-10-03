<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use App\Models\User;
use Livewire\Component;

class Perfil extends Component
{
    public Persona $persona;
    public User $user;

    public function mount()
    {
        $this->persona = Persona::where('cedula', $this->user->email)->first();
    }
    public function render()
    {
        return view('livewire.perfil');
    }
}
