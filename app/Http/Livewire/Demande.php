<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\lesdemande;
use Livewire\WithFileUploads;

class Demande extends Component
{
    use WithFileUploads;
    public $register;
   public $cas;
   public $num_dossier;
   public $crime;
   public $classification;
   public $cas_suspect;
   public $investigateur_légiste;
   public $responsable_enquete;
   public $investigateur_de_cas;
   public $investigateur_tel;
   public $unite_enqueteur;
   public $date_confiscation;
   public $description_demande;
   public $action_demande;
   public $examinateur_notes;
   public $contient_appareils;
   public $cas_urgence;
   public $cas_urgence_justification;
   public $fichier;
   public $user_id;
  
  
   protected $rules = [
    'num_dossier' => 'required',
    'crime' =>'required',
    'classification' => 'required',
    'cas_suspect' => 'required',
    'responsable_enquete' => 'required',
    'investigateur_de_cas' => 'required',
    'investigateur_tel' => 'required',
    'unite_enqueteur' => 'required',
    'date_confiscation' => 'required',
    'description_demande' => 'required',
    'action_demande' => 'required', 
   ];

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
   /*function updated($field){
       $this->validateOnly($field);
   }*/
  

    public function register()
    {
        //$this->validate();
        lesdemande::create([
            'cas' => $this->cas,
            'num_dossier' => $this->num_dossier,
            'crime' => $this->crime,
            'classification' => $this->classification,
            'cas_suspect' => $this->cas_suspect,
            'investigateur_légiste' => $this->investigateur_légiste,
            'responsable_enquete' => $this->responsable_enquete,
            'investigateur_de_cas' => $this->investigateur_de_cas,
            'investigateur_tel' => $this->investigateur_tel,
            'unite_enqueteur' => $this->unite_enqueteur,
            'date_confiscation' => $this->date_confiscation,
            'description_demande' => $this->description_demande,
            'action_demande' => $this->action_demande,
            'examinateur_notes'=> $this->examinateur_notes,
             'contient_appareils'=>$this->contient_appareils,
            'cas_urgence' =>$this->cas_urgence,
            'cas_urgence_justification' =>$this->cas_urgence_justification,
            'fichier' => $this->fichier,
           
        ]);
       

        $this->reset(['cas','num_dossier', 'crime', 'classification', 'cas_suspect','investigateur_légiste',
        'responsable_enquete', 'investigateur_de_cas', 'unite_enqueteur', 'date_confiscation', 'description_demande',
        'action_demande',  'examinateur_notes', 'contient_appareils', 'cas_urgence', 'cas_urgence_justification', 'fichier' ]);
        $this->resetErrorBag();
    
        return redirect()->route('admin.demande-success');
    }
    

        public function render()
        {
            return view('livewire.demande');
        }
  
}
