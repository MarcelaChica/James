<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Enrollment;

class Enrollments extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_user, $id_package, $state, $date, $start, $end, $num_class;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.enrollments.view', [
            'enrollments' => Enrollment::latest()
						->orWhere('id_user', 'LIKE', $keyWord)
						->orWhere('id_package', 'LIKE', $keyWord)
						->orWhere('state', 'LIKE', $keyWord)
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('start', 'LIKE', $keyWord)
						->orWhere('end', 'LIKE', $keyWord)
						->orWhere('num_class', 'LIKE', $keyWord)
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
		$this->id_package = null;
		$this->state = null;
		$this->date = null;
		$this->start = null;
		$this->end = null;
		$this->num_class = null;
    }

    public function store()
    {
        $this->validate([
		'state' => 'required',
        ]);

        Enrollment::create([ 
			'id_user' => $this-> id_user,
			'id_package' => $this-> id_package,
			'state' => $this-> state,
			'date' => $this-> date,
			'start' => $this-> start,
			'end' => $this-> end,
			'num_class' => $this-> num_class
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Enrollment Successfully created.');
    }

    public function edit($id)
    {
        $record = Enrollment::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_user = $record-> id_user;
		$this->id_package = $record-> id_package;
		$this->state = $record-> state;
		$this->date = $record-> date;
		$this->start = $record-> start;
		$this->end = $record-> end;
		$this->num_class = $record-> num_class;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'state' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Enrollment::find($this->selected_id);
            $record->update([ 
			'id_user' => $this-> id_user,
			'id_package' => $this-> id_package,
			'state' => $this-> state,
			'date' => $this-> date,
			'start' => $this-> start,
			'end' => $this-> end,
			'num_class' => $this-> num_class
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Enrollment Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Enrollment::where('id', $id);
            $record->delete();
        }
    }
}
