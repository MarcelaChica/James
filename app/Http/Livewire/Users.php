<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $email, $name, $lastname, $document, $phone, $birthday;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.users.view', [
            'users' => User::latest()
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('lastname', 'LIKE', $keyWord)
						->orWhere('document', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('birthday', 'LIKE', $keyWord)
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
		$this->email = null;
		$this->name = null;
		$this->lastname = null;
		$this->document = null;
		$this->phone = null;
		$this->birthday = null;
    }

    public function store()
    {
        $this->validate([
		'email' => 'required',
		'name' => 'required',
		'lastname' => 'required',
		'document' => 'required',
		'phone' => 'required',
		'birthday' => 'required',
        ]);

        $this-> is_admin = 1;

        User::create([ 
			'email' => $this-> email,
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'document' => $this-> document,
			'phone' => $this-> phone,
			'birthday' => $this-> birthday,
            'is_admin' => $this-> is_admin
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id; 
		$this->email = $record-> email;
		$this->name = $record-> name;
		$this->lastname = $record-> lastname;
		$this->document = $record-> document;
		$this->phone = $record-> phone;
		$this->birthday = $record-> birthday;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'email' => 'required',
		'name' => 'required',
		'lastname' => 'required',
		'document' => 'required',
		'phone' => 'required',
		'birthday' => 'required',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([ 
			'email' => $this-> email,
			'name' => $this-> name,
			'lastname' => $this-> lastname,
			'document' => $this-> document,
			'phone' => $this-> phone,
			'birthday' => $this-> birthday
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'User Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
