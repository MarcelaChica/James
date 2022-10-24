<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Booking;

class Bookings extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_user, $id_teacher, $date, $address, $state;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.bookings.view', [
            'bookings' => Booking::latest()
						->orWhere('id_user', 'LIKE', $keyWord)
						->orWhere('id_teacher', 'LIKE', $keyWord)
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('address', 'LIKE', $keyWord)
						->orWhere('state', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_user = null;
		$this->id_teacher = null;
		$this->date = null;
		$this->address = null;
		$this->state = null;
    }

    public function store()
    {
        $this->validate([
		'state' => 'required',
        ]);

        Booking::create([ 
			'id_user' => $this-> id_user,
			'id_teacher' => $this-> id_teacher,
			'date' => $this-> date,
			'address' => $this-> address,
			'state' => $this-> state
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Booking Successfully created.');
    }

    public function edit($id)
    {
        $record = Booking::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_user = $record-> id_user;
		$this->id_teacher = $record-> id_teacher;
		$this->date = $record-> date;
		$this->address = $record-> address;
		$this->state = $record-> state;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'state' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Booking::find($this->selected_id);
            $record->update([ 
			'id_user' => $this-> id_user,
			'id_teacher' => $this-> id_teacher,
			'date' => $this-> date,
			'address' => $this-> address,
			'state' => $this-> state
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Booking Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Booking::where('id', $id);
            $record->delete();
        }
    }
}
