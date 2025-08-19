<?php

namespace App\Livewire\Library;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class Departments extends Component
{

    use WithPagination;

    // $public $departments;
    public $name, $description, $status;
    public $perPage = 10;

    public $isFormOpen = false;

    public $isEditMode = false;
    public $departmentId;


    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'status' => 'required|in:active,inactive',
    ];


    public function openForm()
    {
        $this->isFormOpen = true;
    }

    public function create()
    {
        $this->isFormOpen = true;
    }


public function store()
    {
        $this->validate();

        Departments::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Department created successfully.');
        $this->closeForm();
    }


    public function edit(Departments $department)
    {

        $this->departmentId = $department->id;
        $this->name = $department->name;
        $this->description = $department->description;
        $this->status = $department->status;
        // $this->isFormOpen = true;
        $this->openForm();
        $this->isEditMode = true;
    }


    public function update()
    {
        $this->validate();

        $department = Departments::findOrFail($this->departmentId);
        $department->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Department updated successfully.');

        $this->closeForm();
        $this->reset(['name', 'description', 'status', 'isEditMode', 'departmentId']);
    }


    public function delete(Departments $department)
    {
        $department->delete();
        session()->flash('message', 'Department deleted successfully.');
    }



    public function closeForm()
    {
        $this->isFormOpen = false;
        $this->reset(['name', 'description', 'status', 'isEditMode', 'departmentId']);
    }

    public function render()
    {
        $departments = Departments::paginate();
        // $this->departments = Department::all();
        return view('livewire.departments', compact('departments'));

    }
}
