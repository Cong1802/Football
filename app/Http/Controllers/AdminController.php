<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRQ;
use App\Models\Admin;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboards');
    }
    public function AddAdmin()
    {
        return view('admin.AddAdmin');
    }
    public function ListAdmin()
    {
        $data = DB::table('tbl_admin')->get();
        return view('admin.ListAdmin',['data' => $data]);
    }
    public function edit_admin($admin_id){
        $admin_edit = Admin::find($admin_id);
    	return view('admin.EditAdmin',['admin_edit'=>$admin_edit]);
    }
    public function admin_login()
    {
        return view('admin.admin_login');
    }
    public function dashboard(LoginRQ $request)
    {
        $login = [
            'email' => $request->admin_email,
            'password' => $request->admin_password,
        ];
        $val = $request->only(['email', 'password']);
        if(Auth::guard('admin')->attempt($login)){
            return redirect('admin/dashboards');
        } else {
            return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }
    public function insert_admin(){
        $data = request()->validate([
            'admin_name'=>'required',
            'admin_email'=>'required',
            'admin_phone'=>'required',
            'admin_password'=>'required'
        ]);
        $admin_info = new Admin();
        $admin_info->name = $data['admin_name'];
        $admin_info->email = $data['admin_email'];
        $admin_info->phone = $data['admin_phone'];
        $admin_info->role = 0;
        $admin_info->password = bcrypt($data['admin_password']);
        $admin_info->save();
    	return redirect('admin/ListAdmin')->with('success','Thêm admin thành công');
    }
    public function update_admin($admin_id){
        $data = request()->validate([
            'admin_name'=>'required',
            'admin_email'=>'required',
            'admin_phone'=>'required',
            'admin_password'=>'required'
        ]);
        $admin_info = Admin::find($admin_id);
        $admin_info->name = $data['admin_name'];
        $admin_info->email = $data['admin_email'];
        $admin_info->phone = $data['admin_phone'];
        $admin_info->password = md5($data['admin_password']);
        $admin_info->save();
    	return redirect('admin/ListAdmin')->with('success','cập nhật admin thành công');
    }
    public function delete_admin($admin_id){
        $del_admin = Admin::find($admin_id);
        $del_admin->delete();
        return redirect('admin/ListAdmin')->with('success','xoá admin thành công');
    }
    public function LogoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    // 
    public function Booking()
    {
        if(Auth::guard('admin')->user()->admin_pitch == 0)
        {
            $data = DB::table('tbl_booking')
            ->join('tbl_pitch','tbl_pitch.pitch_id','=','tbl_booking.booking_pitch')
            ->join('users','users.id','=','tbl_booking.booking_user')
            ->join('tbl_pitch_type','tbl_pitch_type.pitch_type_id','=','tbl_booking.booking_pitch_type')
            ->get();
        }
        else
        {
            $data = DB::table('tbl_booking')
            ->join('tbl_pitch','tbl_pitch.pitch_id','=','tbl_booking.booking_pitch')
            ->join('users','users.id','=','tbl_booking.booking_user')
            ->join('tbl_pitch_type','tbl_pitch_type.pitch_type_id','=','tbl_booking.booking_pitch_type')
            ->where('tbl_booking.booking_pitch', '=', Auth::guard('admin')->user()->admin_pitch)
            ->get();
        }
        return view('admin.booking.ListBooking',['data' => $data]);
    }
    public function DoneBooking($booking_id)
    {
        $update_booking = DB::table('tbl_booking')->where('booking_id',$booking_id)->update(['booking_status' => '1']);
        $booking = DB::table('tbl_booking')->where('booking_id',$booking_id)->first();
        $time_id = $booking->booking_time;
        $tbl_time = DB::table('tbl_price')->where('time_id',$time_id)->first();
        $pitch_TypeJson = $tbl_time->pitch_type;
        $DateJson = $tbl_time->date;
        if($pitch_TypeJson != '' &&  $DateJson != '')
        {
            $pitch_Type = json_decode($pitch_TypeJson);
            $pitch_Type[] = $booking->booking_pitch_type;

            $Date = json_decode($DateJson);
            $Date[] = strtotime(date('Y/m/d',$booking->booking_date));
        }
        else
        {
            $pitch_Type[] = $booking->booking_pitch_type;
            $Date[] = strtotime(date('Y/m/d',$booking->booking_date));
        }
        $pitch_TypeJson = json_encode($pitch_Type);
        $DateJson = json_encode($Date);
        $data_update = [
            'pitch_type' => $pitch_TypeJson,
            'date' => $DateJson,
        ];
        $update_time = DB::table('tbl_price')->where('time_id',$time_id)->update($data_update);
        return redirect('admin/booking')->with('success','thành công');
    }
    public function Profile($id)
    {
        $admin = DB::table('tbl_admin')->where('id',$id)->first();
        $city = DB::table('city2')->where('cit_parent',0)->get();
        $district = DB::table('district')->where('_province_id',Auth::guard('admin')->user()->city)->get();
        $ward = DB::table('ward')->where('_district_id',Auth::guard('admin')->user()->district)->get();
        $street = DB::table('street')->where('_district_id',Auth::guard('admin')->user()->district)->get();
        return view('admin/ProfileAdmin',['city'=>$city,'admin'=>$admin,'district'=>$district,'ward'=>$ward,'street'=>$street]);
    }
    public function UpdateProfile(Request $request)
    {
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'district' => $request->district,
            'ward' => $request->ward,
            'street' => $request->street,
            'address' => $request->address,
        ];
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $storedPath = $image->move('public/uploads', time().$image->getClientOriginalName());
            $data['avt'] = time().$image->getClientOriginalName();
        }
        DB::table('tbl_admin')->where('id',Auth::guard('admin')->id())->update($data);
        return redirect('admin/profile/'.Auth::guard('admin')->id())->with('success','Cập nhật thông tin thành công');
    }
}
