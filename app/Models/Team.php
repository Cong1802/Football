<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
      public $timestamps = false;
      protected $fillable = [
            'team_name','team_address', 'team_level', 'team_desc', 'team_logo','team_phone'
      ];
      protected $primaryKey = 'team_id';
 	protected $table = 'tbl_team';

       public function userInfo(){
            return $this->hasMany(User::class,'user_id'); 
      }
      public function team_match(){
            return $this->hasMany(MatchInfo::class); 
      }
}
