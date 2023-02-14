<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'doctor';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function specialist(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\MasterData\Specialist.php','specialist_id','id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function appointment(){

        // Set on parameter (Path, Table field)
        return $this->hasMany('App\Models\Operational\Appointment.php','doctor_id');
    }
}
