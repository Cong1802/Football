<?php 
use Illuminate\Support\Facades\DB;
    function imgPitch($pitch_id)
    {
        $img = DB::table('tbl_imgPitch')->where('pitch_id',$pitch_id)->first();
        return $img;
    }
    function imgPitchs($pitch_id)
    {
        $img = DB::table('tbl_imgPitch')->where('pitch_id',$pitch_id)->get();
        if($img)
            return $img;
        else
            return false;
    }
    function city($id)
    {
        $city =DB::table('city2')->select('cit_name')->where('cit_id',$id)->first();
        return $city;
    }
    function district($id)
    {
        $district =DB::table('district')->select('_name')->where('id',$id)->first();
        return $district;
    }
    function ward($id)
    {
        $ward =DB::table('ward')->select('_name')->where('id',$id)->first();
        return $ward;
    }
    function street($id)
    {
        $street =DB::table('street')->select('_name')->where('id',$id)->first();
        return $street;
    }
    function extension($id)
    {
        $extension =DB::table('tbl_extension')->select('ex_name')->where('ex_id',$id)->first();
        return $extension;
    }
    function timeslot($id)
    {
        $timeslot =DB::table('tbl_price')->select('time_start','time_end')->where('time_id',$id)->first();
        $time = date('H:i',$timeslot->time_start).' - '.date('H:i',$timeslot->time_end);
        return $time;
    }
    function price($id)
    {
        $timeslot =DB::table('tbl_price')->select('price')->where('time_id',$id)->first();
        return $timeslot->price;
    }
    
    