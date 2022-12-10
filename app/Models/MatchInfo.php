<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchInfo extends Model
{
      public $timestamps = false;
      protected $fillable = [
          'match_time','match_team_level', 'match_desc', 'match_status','team_id'
      ];
      protected $primaryKey = 'match_id';
      protected $table = 'tbl_match';

      public function match_team(){
            return $this->belongsTo(Team::class,'team_id'); 
      }
}
