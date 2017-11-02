<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  use Notifiable;

  const VERIFIED_USER = '1';
  const UNVERIFIED_USER = '0';

  const ADMIN_USER = 'true';
  const REGULAR_USER = 'false';

  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'verified',
    'verification_token',
    'admin',
  ];

  
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 
    'remember_token',
    'verification_token',
  ];
  /**
   * Buyer and seller will use this value for table reference
   */
  protected $table = 'users';

  //Mutators-----------------------------------------
  public function setNameAttribute($name) {
    $this->attributes['name'] = strtolower($name);
  }

  public function setEmailAttribute($email) {
    $this->attributes['email'] = strtolower($email);
  }
  //---------------------------------------------------
  
  //Accessors-------------------------------------------
  public function getNameAttribute($name) {
    return ucwords($name);
  }
  //-----------------------------------------------------

  public function isVerified() {
    return $this->verified == User::VERIFIED_USER;
  }

  public function isAdmin() {
    return $this->admin == User::ADMIN_USER;
  }

  public static function generateVerificationCode() {
    return str_random(40);
  }

}
