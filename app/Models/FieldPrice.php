<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldPrice extends Model
{
    protected $fillable = [
    	'field_price_time','field_price_unit_price'
    ];
    protected $primaryKey = 'field_type_id';
 	protected $table = 'tbl_field_price';
}
