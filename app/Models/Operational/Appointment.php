<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'appointment';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function doctor(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\Operational\Doctor','doctor_id','id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function consultation(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\MasterData\Consultation','consultation_id','id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function user(){

        // Set Path and Table field on parameter (Path, field, field primary key)
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    // Set Relationship One to Many to detail_user table on type_user_id field
    public function transaction(){

        // Set on parameter (Path, Table field)
        return $this->hasOne('App\Models\Operational\Transaction','appointment_id');
    }
}
