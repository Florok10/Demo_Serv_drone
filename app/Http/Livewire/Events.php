<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $orderBy = 'title';
    public $sortBy = 'asc';
    public $search = "";
    public $checked = [];

    protected $rules = [
        'title' => '',
        'date' => '',
        'place' => 'required|string|regex:^/'
    ];

    public function mount()
    {
        // $this->events = Event::all();
    }

    public function render()
    {

        $search = '%' . $this->search . '%';

        return view('livewire.events', [
            'search' => $this->search,
            'checked' => $this->checked,
            'events' => Event::orderBy($this->orderBy, $this->sortBy)
                            ->where('title', 'like', $search)
                            ->orWhere('place', 'like', $search)
                            ->paginate($this->perPage)
        ]);
    }

    public function deleteSingleRecord($id)
    {
        Event::findOrFail($id)->delete();
        session()->flash('info', 'Événement supprimé avec succès');

    }

    public function deleteRecords()
    {
        Event::whereKey($this->checked)->delete();
        $this->checked = [];
        session()->flash('info', 'Événements sélectionnés supprimés avec succès');
    }

    public function createEvent()
    {
        $event = new Event();

    }
}
