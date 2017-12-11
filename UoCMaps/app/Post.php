<?php

namespace UoCMaps;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'users';
  protected $fillable = ['title','name','email','nic','job_title','password','description'];
  protected $hidden = ['password', 'remember_token',];

  public function is_admin(){
    if($this->admin){
      return true;
    }
    return false;
  }

  public function is_approve(){
    if($this->approve){
      return true;
    }
    return false;
  }
}
