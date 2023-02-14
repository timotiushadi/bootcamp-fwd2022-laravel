<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'detail_user';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'photo',
        'gender',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function type_user(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\MasterData\TypeUser.php','type_user_id','id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function user(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\User.php','user_id','id');
    }
}
