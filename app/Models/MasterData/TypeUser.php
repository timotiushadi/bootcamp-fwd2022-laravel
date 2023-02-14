<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'type_user';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function detail_user(){

        // Set on parameter (Path, Table field)
        return $this->hasMany('App\Models\ManagementAccess\DetailUser.php','type_user_id');
    }
}
