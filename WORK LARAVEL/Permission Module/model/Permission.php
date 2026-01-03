<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Permission extends Model
{
	use SoftDeletes;
	protected $table = 'permissions';
    protected $fillable = ['name', 'slug'];

    public function getPermissionList()
    {
        return static::get();
    }
	
	public function getAllowedPermissionList()
    {
        return static::where('id', '!=', 9)->get();
    }
}
