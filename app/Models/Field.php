<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
    	'field_name', 'field_status','field_type_id'
    ];
    protected $primaryKey = 'field_id';
 	protected $table = 'tbl_field';

    public function field_type(){
    	return $this->belongsTo('App\Models\FieldType','field_type_id'); 
    }
    // có thể có nhiều hàm nếu có quan hệ với nhau
}
