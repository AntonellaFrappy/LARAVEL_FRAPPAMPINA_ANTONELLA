<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class UserForm extends Component
{
    use WithFileUploads;

    public $userId = null;
    
    //#[Validate('required|max:5')]
    #[Validate]
    public $name;

    //#[Validate('required', message: 'Email obbligatoria')]
    public $email;

    //#[Validate('required', message: 'Password mancante')]
    public $password;

    #[Validate('image|max:2048')]
    public $photo;

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ];

        if(! $this->userId) {
            $rules['password'] = 'required';
        }

        return $rules;
    }

    public function submit()
    {
        $this->validate();

        if($this->userId) {
            // sono in modalità modifica

            $user = User::find($this->userId);

            $user->name = $this->name;
            $user->email = $this->email;

            if($this->password) {
                $user->password = $this->password;
            }

            $user->save();

            session()->flash('success', 'Utente modificato correttamente.');

        } else {

            // User::create($this->all());
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);

            if($this->photo) {
                $fileName = $user->id . '.' . $this->photo->extension();
                $user->photo = $this->photo->storeAs('public/images/articles/', $fileName);
                $user->save();
            }

            session()->flash('success', 'Utente creato.');

        }

        $this->resetForm();

        $this->dispatch('update-users-list');
    }

    #[On('edit-user')]
    public function edit(User $user)
    {
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function resetForm()
    {
        $this->userId = 'null';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->photo = '';
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}