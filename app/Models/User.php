<?php

namespace App\Models;

use App\Models\lesdemande;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $Drapeaux = [];
    protected $fillable = [
        'name',
        'Prénom',
        'Rang',
        'email',
        'password',
        'role_id',
        'Drapeaux',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
    ];

    public function Demande()
    {
        return $this->hasMany(lesdemande::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public static function userRoleList()
    {
        return [
            'admin' => 'Administrateur',
            'Enquêteur' => 'Enqueteur',
            'Avocat' => 'Avocat',
        ];
    } 
}
