<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $primarykey = 'medicare_no';
     protected $table = 'patients';

    protected $fillable = [
        'medicare_no','name','email','contact','registerBy'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
      



}
