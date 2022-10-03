<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class UsuariosTable extends Component
{

    public User $currentUsuario;
    public bool $formVisible = false;
    public Collection $usuarios;

    public function render()
    {
        return view('livewire.usuarios-table');
    }

    public function mount()
    {
        $this->usuarios = User::orderBy("created_at")->get();
    }
}
