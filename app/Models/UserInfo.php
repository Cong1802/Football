<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
      public $timestamps = false;
      protected $fillable = [
            'team_id','email',  'password',  'name', 'user_phone', 'user_image'
      ];
      protected $primaryKey = 'id';
            protected $table = 'users';


       public function Team(){
            return $this->hasOne(Team::class); 
      }
}
