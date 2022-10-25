<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher;

class Teachers extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $lastname, $document;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.teachers.view', [
            'teachers' => Teacher::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('lastname', 'LIKE', $keyWord)
						->orWhere('document', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->lastname = null;
		$this->document = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'document' => 'required|min:7',
        ]);

        Teacher::create([ 
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'document' => $this-> document
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Teacher Successfully created.');
    }

    public function edit($id)
    {
        $record = Teacher::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->lastname = $record-> lastname;
		$this->document = $record-> document;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
        ]);

        if ($this->selected_id) {
			$record = Teacher::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'document' => $this-> document
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Teacher Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Teacher::where('id', $id);
            $record->delete();
        }
    }
}
