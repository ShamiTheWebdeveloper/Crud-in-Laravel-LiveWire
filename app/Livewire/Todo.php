<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class Todo extends Component
{
    public $users;
    public function render()
    {
        $this->users=User::all();
        return view('livewire.todo');
    }
}
