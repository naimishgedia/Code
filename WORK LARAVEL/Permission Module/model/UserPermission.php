<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserPermission extends Model
{
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */

    protected $table = 'user_permission';

    protected $fillable = [
        'user_id', 'permission_id'
    ];

    public $timestamps = false;

    public function getUserPerUsingUserId($userId)
    {
    	return static::where('user_id',$userId)
    				->pluck('permission_id','permission_id')
    				->all();
    }

    public function removePermissionWithUserId($userId)
    {
        return static::select("user_permissions.*")
                    ->where('user_id',$userId)
                    ->delete();
    }

    public function addUserPermission($input)
    {
		return static::create(array_only($input,$this->fillable));
    }
}
