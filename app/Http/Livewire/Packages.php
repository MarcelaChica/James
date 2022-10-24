<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Package;

class Packages extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $price, $num_class;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.packages.view', [
            'packages' => Package::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('price', 'LIKE', $keyWord)
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
		$this->name = null;
		$this->price = null;
		$this->num_class = null;
    }

    public function store()
    {
        $this->validate([
		'price' => 'required',
		'num_class' => 'required',
        ]);

        Package::create([ 
			'name' => $this-> name,
			'price' => $this-> price,
			'num_class' => $this-> num_class
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Package Successfully created.');
    }

    public function edit($id)
    {
        $record = Package::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->price = $record-> price;
		$this->num_class = $record-> num_class;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'price' => 'required',
		'num_class' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Package::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'price' => $this-> price,
			'num_class' => $this-> num_class
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Package Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Package::where('id', $id);
            $record->delete();
        }
    }
}
