<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient_details extends Model
{
    protected $primarykey = 'medicare_no';
    protected $table = 'patient_details';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'medicare_no','name','details','doctor_name'
    ];

}
