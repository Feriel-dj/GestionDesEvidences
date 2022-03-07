<?php

namespace App\Http\Livewire;

use DateTimeInterface;
use App\Models\lesdemande;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Wildside\Userstamps\Userstamps;

class JournalDeCas extends Component
{
    

    public $search = "";
    protected $paginationTheme = "bootstrap";
    public $register;
    public $classification;
    public $crime;
    public $cas_suspect;
    public $investigateur_de_cas;
    public $fichier;
    public $created_by;
    
    public $newValue = "";

   
    
    public function rules(){
        return [
            'classification' => 'required',
            'crime' => 'required',
            'cas_suspect' => 'required',
            'investigateur_de_cas' => 'required',
            'fichier' => 'required', 
           ];
    }
   /* public function loadModel()
    {
        $data = lesdemande::find();
        // Assign the variables here
       
        $this->id = $data->id;
        $this->classification = $data->classification;
        $this->crime = $data->crime;
        $this->cas_suspect = $data->cas_suspect;
        $this->investigateur_de_cas = $data->investigateur_de_cas; 
    }*/
   
    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        $data = [
            "affichedemande" => lesdemande::where("id", "like",  $searchCriteria)->latest()->paginate(5),
        ];
        return view('livewire.journal-de-cas', $data)
            ->extends("livewire.demande")
            ->section("contenu");   
    }
    
    
}
