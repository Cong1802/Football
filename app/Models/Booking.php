<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    	'user_id', 'field_id', 'booking_start','booking_end','booking_status','booking_price','booking_total'
    ];
    protected $primaryKey = 'booking_id';
 	protected $table = 'tbl_booking';

}
