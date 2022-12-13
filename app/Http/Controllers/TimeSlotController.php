<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceTime;
use App\Http\Models\BookingTime;
use BookingTime as GlobalBookingTime;
use DB;
use Auth;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function TimeSlot()
    {
        if(isset($_GET['pitch_type']))
        {
            $pitch_type = $_GET['pitch_type'];
            if(Auth::guard('admin')->user()->role == 1)
            {
                $list_price = DB::table('tbl_price')->where('type',$pitch_type)->where('pitch',Auth::guard('admin')->user()->admin_pitch)->get();
            }
            else
            {
                $list_price = DB::table('tbl_price')->where('type',$pitch_type)->where('pitch',Auth::guard('admin')->user()->admin_pitch)->get();
            }
        }
        else
        {
            if(Auth::guard('admin')->user()->role == 1)
            {
                $list_price = DB::table('tbl_price')->where('type',3)->where('pitch',Auth::guard('admin')->user()->admin_pitch)->get();
            }
            else
            {
                $list_price = DB::table('tbl_price')->where('type',3)->where('pitch',Auth::guard('admin')->user()->admin_pitch)->get();
            }
        }
        $type = DB::table('tbl_type')->get();
        return view('admin.timeslot.TimeSlot',['list_price' => $list_price,'type'=>$type]);
    }
    public function FormAddTime()
    {
        $type = DB::table('tbl_type')->get();
        $listPitch = DB::table('tbl_pitch')->get();
        return view('admin.timeslot.AddTimeSlot',['listPitch' => $listPitch,'type' => $type]);
    }
    public function InsertTimeSlot(PriceTime $request)
    {
        $data = [
            'time_start' => $request->time_st,
            'time_end'   => $request->time_end,
            'price' => $request->price,
            'pitch' => $request->pitch,
            'type' => $request->pitch_type,
        ];

        DB::table('tbl_price')->insert($data);
        return redirect('admin/time-slot?pitch_type='.$request->pitch_type)->with('success','Thêm mới sân bóng thành công');
    }
    public function EditTime($time_id){
        $listPitch = DB::table('tbl_pitch')->get();
        $time_edit = DB::table('tbl_price')->where('time_id',$time_id)->first();
    	return view('admin.timeslot.EditTimeSlot',['time_edit'=>$time_edit],['listPitch' => $listPitch]);
    }
    public function UpdateTime(PriceTime $request,$time_id){
        $data = [
            'time_start' => strtotime($request->time_st." 18-02-1999"),
            'time_end'   => strtotime($request->time_end." 18-02-1999"),
            'price' => $request->price,
            'pitch' => $request->pitch,
        ];
        DB::table('tbl_price')->where('time_id',$time_id)->update($data);
    	return redirect('admin/time-slot')->with('success','cập nhật khung giờ thành công');
    }
    public function DeleteTime($time_id){
        $delete = DB::table('tbl_price')->where('time_id',$time_id)->delete();
        return redirect('admin/time-slot')->with('success','xoá khung giờ thành công');
    }
}
