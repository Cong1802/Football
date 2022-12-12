<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Field;
use App\Models\Booking;
use DB;
use App\Models\Team;
use App\Models\UserInfo;
use App\Models\FieldType;
use App\Models\FieldPrice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class BookingController extends Controller
{
    public function booking($pitch_id){
        $list_pitch = DB::table('tbl_pitch')->get();
        $pitch = DB::table('tbl_pitch')->where('pitch_id',$pitch_id)->first();
        $id_manager = $pitch->pitch_manager;
        $list_img = DB::table('tbl_imgPitch')->where('pitch_id',$pitch_id)->get();
        $manager = DB::table('tbl_admin')->where('id',$id_manager)->first();
        $type = DB::table('tbl_type')->get();
        $type_max = DB::table('tbl_type')->max('type_id');
        $pitch_type = DB::table('tbl_pitch_type')->where('pitch_type',$type_max)->get();

        return view('pages.booking.booking')->with(compact('pitch','list_img','manager','pitch_type','type','list_pitch'));
    }
    public function create_booking(Request $request){
        // dd($request);
        $data = [
            'booking_user'=>$request->user_id,
            'booking_pitch'=>$request->pitch,
            'booking_type'=>$request->type,
            'booking_pitch_type'=>$request->pitch_type,
            'booking_date'=>strtotime($request->booking_details_date),
            'booking_time'=>$request->booking_time,
            'booking_time_cr'=>time(),
            'booking_status'=>0,
            'booking_phone' => $request->booking_phone
        ];

        $insert = DB::table('tbl_booking')->insert($data);
    	return redirect('/history-booking')->with('success','Tạo phiếu đặt sân thành công, sẽ có người gọi tới để xác nhận đặt sân xin chờ máy');

    } 


    public function history_booking(){
        $booking_history = DB::table('tbl_booking')->select('time_start', 'time_end','booking_phone','user_phone', 'booking_status','type_name','pitch_type_name','pitch_name','name','price')
        ->join('tbl_pitch','tbl_pitch.pitch_id','=','tbl_booking.booking_pitch')
        ->join('users','users.id','=','tbl_booking.booking_user')
        ->join('tbl_pitch_type','tbl_pitch_type.pitch_type_id','=','tbl_booking.booking_pitch_type')
        ->join('tbl_type','tbl_type.type_id','=','tbl_booking.booking_type')
        ->join('tbl_price','tbl_price.time_id','=','tbl_booking.booking_time')
        ->where('tbl_booking.booking_user', '=', Auth::guard('web')->user()->id)
        ->orderby('tbl_booking.booking_id','desc')->paginate(2);

        $admin = DB::table('tbl_admin')->Where('role',1)->first();
        return view('pages.booking.history_booking')->with(compact('booking_history','admin'));
    }
    // backend
    public function SelectPitchType(Request $request)
    {
        $id = $request->id;
        $pitch_id = $request->pitch_id;

        $pitch_type = DB::table('tbl_pitch_type')->where('pitch_type', $id)->where('pitch_type_parent', $pitch_id)->get();
        echo json_encode($pitch_type);
    }
    public function SelectDate(Request $request)
    {
        $pitch_type_id = $request->pitch_type_id;
        $pitch_id = $request->pitch_id;
        $type_id = $request->type_id;
        $date = strtotime($request->date);
        $pitch_type = DB::table('tbl_price')->where('type', $type_id)->where('pitch', $pitch_id)
        ->orderBy('time_start', 'asc')
        ->get();
        $data = [];
        $i=0;
        foreach ($pitch_type as $key => $value)
        {
            $data[$i]['time_st'] = date('H:i',$value->time_start);
            $data[$i]['time_end'] = date('H:i',$value->time_end);
            $data[$i]['time_id'] = $value->time_id;
            $data[$i] ['price'] = $value->price;
            if($value->pitch_type != '' && $value->date != '')
            {
                $check_pitch_Type = json_decode($value->pitch_type);

                $check_date = json_decode($value->date);
                foreach($check_pitch_Type as $key => $arr_pitch_Type)
                {
                    if($arr_pitch_Type == $pitch_type_id && $check_date[$key] == $date)
                    {
                        $data[$i]['disabled'] = 1;
                        break;
                    }
                    else
                    {
                        if(strtotime(date('H:i',time()).' 18-02-1999') < $value->time_start)
                        {
                            $data[$i]['disabled'] = 1;
                            break;
                        }
                        else
                        {
                            $data[$i]['disabled'] = 0;
                        }
                    }
                }
            }
            else
            {
                if(strtotime(date('H:i',time()).' 18-02-1999') > $value->time_start)
                {
                    $data[$i]['disabled'] = 1;
                }
                else
                {
                    $data[$i]['disabled'] = 0;
                }
            }

            $i++;
        }
        echo json_encode($data);
    }
}
