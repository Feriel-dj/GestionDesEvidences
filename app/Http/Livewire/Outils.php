<?php

namespace App\Http\Livewire;

use App\Models\lesoutils;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Outils extends Component
{
    use WithPagination;
    public $modalFormVisisble = false;
    public $modalConfirmDeleteVisible= false;
    public $modelId;
    public $nom_produit;
    public $version_logiciel;
    public $version_matériel;
    public $Num_série;
    public $détails;


    public function rules()
    {
        return [
            'nom_produit' => 'required',
            'version_logiciel' => 'required', 
            'version_matériel' => 'required',
            'Num_série' => 'required',
           
        ]; 
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->validate();
        lesoutils::create($this->modelData());
        $this->modalFormVisisble = false;
        $this->resetVars();
    }

    public function read()
    {
        return lesoutils::paginate(5);
    }
    
    public function update()
    {
        $this->validate();
        lesoutils:: find($this->modelId)->update($this->modelData());
        $this->modalFormVisisble = false;
    }

    public function delete()
    {
        lesoutils::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function createShowModal(){
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisisble = true;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisisble = true;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function loadModel()
    {
        $data = lesoutils::find($this->modelId);
        $this->nom_produit = $data->nom_produit;
        $this->version_logiciel = $data->version_logiciel ;
        $this->version_matériel = $data->version_matériel;
        $this->Num_série = $data->Num_série;
        $this->détails = $data->détails;

    }

    public function modelData(){
        return [
            'nom_produit' => $this->nom_produit,
            'version_logiciel' => $this->version_logiciel,
            'version_matériel' => $this->version_matériel,
            'Num_série' => $this->Num_série,
            'détails' => $this->détails,
        ];
    }

    public function resetVars()
    {
        $this->modelId = null;
        $this->nom_produit = null;
        $this->version_logiciel = null;
        $this->version_matériel = null;
        $this->Num_série = null;
        $this->détails = null;
    }

    public function render()
    {
        return view('livewire.outils', [
            'data' => $this->read(),
        ]);
    }
}
