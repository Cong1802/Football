<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    // public $timestamps = false; //set time to false
    protected $fillable = [
    	'field_type_name', 'field_type_desc', 'field_type_status'
    ];
    protected $primaryKey = 'field_type_id';
 	protected $table = 'tbl_field_type';

    public function field(){
    	return $this->hasMany('App\Models\Field'); 
    }
}
