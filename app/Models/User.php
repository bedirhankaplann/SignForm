<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use SoftDeletes;
    protected  $table = 'kullanici';
    protected $fillable = ['namesurname', 'email', 'identityNo', 'password', 're_password', 'activate_key', 'activate_status'];
    protected $hidden = ['password'];

}
