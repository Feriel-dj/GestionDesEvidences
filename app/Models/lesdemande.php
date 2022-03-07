<?php

namespace App\Models;

use App\Models\User;
use DateTimeInterface;
use carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class lesdemande extends Model
{
   
    use HasFactory;
    use Userstamps;
    

    public $table ='lesdemandes';

    public $guarded = [];
   protected $primaryKey = 'id';

   protected $dates = [
    'start_date',
    'created_at',
    'updated_at',
   
];
protected $user = [
   ' user_id',
];
  

    protected $fillable = [
        
        'cas',
        'num_dossier',
        'crime',
        'classification',
        'cas_suspect',
        'investigateur_légiste',
        'responsable_enquete',
        'investigateur_de_cas',
        'investigateur_tel',
        'unite_enqueteur',
        'date_confiscation',
        'description_demande',
        'action_demande',
        'examinateur_notes',
        'contient_appareils',
        'cas_urgence',
        'cas_urgence_justification',
        'fichier',
        'user_id',
        'created_by',
        'updated_by',
        'deleted_by',
       
    ];
   
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
  
}
