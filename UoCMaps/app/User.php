<?php

namespace UoCMaps;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'nic', 'job_title', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_admin(){
      if($this->admin==1){
        return true;
      }
      return false;
    }

    public function is_approve(){
      if($this->approve==1){
        return true;
      }
      return false;
    }
}
