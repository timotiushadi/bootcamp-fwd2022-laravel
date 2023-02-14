<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ConfigPayment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare Table   
    public $table = 'config_payment';

    //This field must be set type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Declare fillable fields
    protected $fillable = [
        'fees',
        'vat',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
