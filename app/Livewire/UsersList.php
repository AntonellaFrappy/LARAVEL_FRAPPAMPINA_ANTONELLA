<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UsersList extends Component
{
    public function edit($user_id)
    {
        $this->dispatch('edit-user', $user_id);
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    #[On('update-users-list')]
    public function render()
    {
        return view('livewire.users-list', [
            'users' => User::orderBy('id', 'DESC')->get(),
        ]);
    }
}