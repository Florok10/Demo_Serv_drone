<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $created_at, $updated_at, $name, $admin;
    public $checked = [];
    public $byName = null;
    public $perPage = 10;
    public $orderBy = "name";
    public $sortBy = 'asc';
    public $search = "";

    public function mount()
    {
        //
    }

    public function render()
    {

        $search = '%' . $this->search . '%';

        return view('livewire.users', [
            'search' => $this->search,
            'checked' => $this->checked,
            'users' => User::orderBy($this->orderBy, $this->sortBy)
                            ->where('name', 'like', $search)
                            ->orWhere('first_name', 'like', $search)
                            ->orWhere('id', 'like', $search)
                            ->paginate($this->perPage)
        ]);
    }

    public function deleteSingleRecord($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('info', 'Utilisateur supprimé avec succès');
    }

    public function updateAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->admin = $this->admin;
        $user->save();
        session()->flash('info', 'Privillèges mis à jour');    }

    public function deleteUsers()
    {
        User::whereKey($this->checked)->delete();
        $this->checked = [];
        session()->flash('info', 'Utilisateurs sélectionnés supprimés avec succès');
    }


}
