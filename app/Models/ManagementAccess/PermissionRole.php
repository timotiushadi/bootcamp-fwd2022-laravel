<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'permission_role';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function role(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\ManagementAccess\Role.php','role_id','id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function permission(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\ManagementAccess\Permission.php','permission_id','id');
    }
}
