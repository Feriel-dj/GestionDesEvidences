<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    
    //the list of route when authenticated
    protected $fillable = ['role_id', 'route_name'];
    public static function routeNameList()
    {
       return [
        'admindashboard',
        ' demande',
        'outils',
        
        
       ];
    }

    public static function isRoleHasRightToAccess($userRole, $routeName)
    {
        try {
            $model = static::where('role_id', $userRole)
                ->where('route_name', $routeName)
                ->first();

            return $model ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
