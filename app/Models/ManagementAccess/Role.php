<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'role';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function role_user(){

        // Set on parameter (Path, Table field)
        return $this->hasMany('App\Models\ManagementAccess\RoleUser.php','role_id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function permission_role(){

        // Set on parameter (Path, Table field)
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole.php','role_id');
    }
}
