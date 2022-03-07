<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Users extends Component
{
    
    use WithPagination;
    
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;

    /**
     * Put your custom public properties here!
     */
   
    public $Username;
    public $name;
    public $Prénom;
    public $email;
    public $password;
    public $role_id;
    



    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [  
          
            'name' => 'required',
            'Prénom' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
           
                     
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = User::find($this->modelId);
        // Assign the variables here
       
        $this->name = $data->name;
        $this->Prénom = $data->Prénom;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->role_id = $data->role_id;
        
        
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [ 
           
              
            'name' => $this->name, 
            'Prénom' => $this->Prénom, 
            'email' => $this->email, 
            'password' => $this->password, 
            'role_id' => $this->role_id,            
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        User::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
       
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return User::paginate(5);
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        User::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }    

    public function render()
    {
        Carbon::setLocale("fr");
        return view('livewire.users', [
            'data' => $this->read(),
        ]);
    }
}