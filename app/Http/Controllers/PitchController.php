<?php

namespace App\Http\Controllers;

use App\Http\Requests\PitchTypeRQ;
use App\Http\Requests\PitchRQ;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class PitchController extends Controller
{
    public function index()
    {
        $city = DB::table('city2')->where('cit_parent',0)->get();
        $list_admin = DB::table('tbl_admin')->where('admin_pitch',0)->where('role',0)->get();
        $extension = DB::table('tbl_extension')->get();
        return view('admin.pitch.FormAddPitch',['list_admin' => $list_admin,'city'=>$city,'extension'=>$extension]);
    }
    public function getStreetBy(Request $request) {

		$cit_id = $request->city;
        $city = DB::table('street')->where('_district_id',$cit_id)->get();
		echo json_encode($city);
	}
    public function ajaxGetListDistricts(Request $request) {
		$cit_id = $request->city;
        $district = DB::table('district')->where('_province_id',$cit_id)->get();
		echo json_encode($district);
	}
	public function ajaxGetListWards(Request $request) {
		$cit_id = $request->city;
        $ward = DB::table('ward')->where('_district_id',$cit_id)->get();
		echo json_encode($ward);
	}
	public function InsertPitch(PitchRQ $request) {
		$data = [
			'pitch_id' => $request->pitch_id,
            'pitch_name' => $request->pitch_name,
            'pitch_manager' => $request->pitch_manager,
            'pitch_description' => $request->pitch_description,
            'pitch_city' => $request->pitch_city,
            'pitch_ward' => $request->pitch_ward,
            'pitch_street' => $request->pitch_street,
            'pitch_address' => $request->pitch_address,
            'pitch_status' => 0,
            'pitch_district' => $request->pitch_district,
			'pitch_link_map' => $request->pitch_link_map,
            'pitch_extension' => json_encode($request->extension),
            'pitch_time' => time(),
			
		];
		$insert = DB::table('tbl_pitch')->insert($data);
		$id_pitch = DB::getPdo()->lastInsertId();
		if($request->hasFile('images')) {
			foreach($request->file('images') as $file)
			{
			    $name = time().$file->getClientOriginalName();
				$storedPath = $file->move('public/uploads/pitch', time().$file->getClientOriginalName());
			    $data_img = 
				[
					'img_name' => $name,
					'pitch_id' => $id_pitch,
					'time_up' => time(),
				];
				DB::table('tbl_imgPitch')->insert($data_img);
			}
        }
		DB::table('tbl_admin')->where('id', $request->pitch_manager)->update(['admin_pitch'=>$id_pitch]);
		return redirect('admin/ListPitch')->with('success','Thêm mới sân bóng thành công');
	}
	public function EditPitch($pitch_id){
		$pitch = DB::table('tbl_pitch')->where('pitch_id', $pitch_id)->first();
        $extension = DB::table('tbl_extension')->get();

		$cit_id = $pitch->pitch_city;
		$district_id = $pitch->pitch_district;
		$ward_id = $pitch->pitch_ward;

		$city = DB::table('city2')->where('cit_parent',0)->get();
        $district = DB::table('district')->where('_province_id',$cit_id)->get();
        $ward = DB::table('ward')->where('_district_id',$district_id)->get();
        $street = DB::table('street')->where('_district_id',$district_id)->get();

        $list_admin = DB::table('tbl_admin')->where('admin_pitch',0)->where('role',0)->get();
    	return view('admin.pitch.EditPitch',['list_admin'=>$list_admin,'extension'=>$extension,'city' => $city,'district' => $district,'ward' => $ward,'street' => $street,'pitch' => $pitch]);
    }
    public function UpdatePitch(PitchRQ $request,$pitch_id){
		$data = [
            'pitch_name' => $request->pitch_name,
            'pitch_manager' => $request->pitch_manager,
            'pitch_description' => $request->pitch_description,
            'pitch_city' => $request->pitch_city,
            'pitch_ward' => $request->pitch_ward,
            'pitch_street' => $request->pitch_street,
            'pitch_address' => $request->pitch_address,
            'pitch_status' => 0,
            'pitch_district' => $request->pitch_district,
            'pitch_link_map' => $request->pitch_link_map,
            'pitch_extension' => json_encode($request->extension),
		];
		if($request->hasFile('images')) {
			foreach($request->file('images') as $file)
			{
			    $name = time().$file->getClientOriginalName();
				$storedPath = $file->move('public/uploads/pitch', time().$file->getClientOriginalName());
			    $data_img = 
				[
					'img_name' => $name,
					'pitch_id' => $pitch_id,
					'time_up' => time(),
				];
				DB::table('tbl_imgPitch')->insert($data_img);
			}
        }
        DB::table('tbl_pitch')->where('pitch_id',$pitch_id)->update($data);
    	return redirect('admin/ListPitch')->with('success','cập nhật sân bóng thành công');
    }
	public function DeleteImg(Request $request){
		$img_id = $request->img_id;
		$img = DB::table('tbl_imgPitch')->select('img_name')->where('img_id',$img_id)->first();
		if(file_exists(public_path().'/uploads/pitch/'.$img->img_name))
		{
			unlink(public_path().'/uploads/pitch/'.$img->img_name);
		}
		$delete_img = DB::table('tbl_imgPitch')->where('img_id',$img_id)->delete();
    }
    public function DeletePitch($pitch_id){
		$arr_img = DB::table('tbl_imgPitch')->select('img_name')->where('pitch_id',$pitch_id)->get();
		$admin_pitch = DB::table('tbl_pitch')->select('pitch_manager')->where('pitch_id',$pitch_id)->first();
		foreach($arr_img as $key => $value)
		{
			if(file_exists(public_path().'/uploads/pitch/'.$value->img_name))
			{
				unlink(public_path().'/uploads/pitch/'.$value->img_name);
			}
		}
		$delete_role = DB::table('tbl_admin')->where('id',$admin_pitch->pitch_manager)->update(['admin_pitch'=>0]);
		$delete_img = DB::table('tbl_imgPitch')->where('pitch_id',$pitch_id)->delete();
		$delete_img = DB::table('tbl_pitch_type')->where('pitch_type_parent',$pitch_id)->delete();
        $delete = DB::table('tbl_pitch')->where('pitch_id',$pitch_id)->delete();
        return redirect('admin/ListPitch')->with('success','xoá sân bóng thành công');
    }
	public function ListPitch()
	{
		$data = DB::table('tbl_pitch')->get();
		$city = DB::table('city2');
		return view('admin.pitch.ListPitch',['data' => $data,'city'=>$city]);
	}

	// public type
	public function ListPitchType()
	{
		if(Auth::guard('admin')->user()->role == 0)
		{
			$data = DB::table('tbl_pitch_type')->where('pitch_type_parent',Auth::guard('admin')->user()->admin_pitch)->get();
		}
		else
		{
			$data = DB::table('tbl_pitch_type')->get();
		}
		return view('admin.pitch.ListPitchType',['data' => $data]);
	}
	public function FormPitchType()
    {
		$type = DB::table('tbl_type')->get();
        $listPitch = DB::table('tbl_pitch')->get();
        return view('admin.pitch.FormPitchType',['listPitch' => $listPitch,'type' => $type]);
    }
	public function InsertPitchType(PitchTypeRQ $request)
    {	
		$data = [
			'pitch_type' => $request->pitch_type,
			'pitch_type_parent' => $request->pitch_type_parent,
			'pitch_type_name' => $request->pitch_type_name,
		];
		$insert = DB::table('tbl_pitch_type')->insert($data);
		return redirect('admin/ListPitchType')->with('success','Thêm mới sân bóng thành công');
    }
	public function EditPitchType($pitch_type_id){
        $type = DB::table('tbl_type')->get();
        $listPitch = DB::table('tbl_pitch')->get();
        $Pitch_type = DB::table('tbl_pitch_type')->where('pitch_type_id',$pitch_type_id)->first();
    	return view('admin.pitch.EditPitchType',['type'=>$type,'listPitch' => $listPitch,'pitch_type'=>$Pitch_type]);
    }
    public function UpdatePitchType(PitchTypeRQ $request,$pitch_type_id){
        $data = [
			'pitch_type' => $request->pitch_type,
			'pitch_type_parent' => $request->pitch_type_parent,
			'pitch_type_name' => $request->pitch_type_name,
        ];
        DB::table('tbl_pitch_type')->where('pitch_type_id',$pitch_type_id)->update($data);
    	return redirect('admin/ListPitchType')->with('success','cập nhật sân bóng thành công');
    }
    public function DeletePitchType($pitch_type_id){
        $delete = DB::table('tbl_pitch_type')->where('pitch_type_id',$pitch_type_id)->delete();
        return redirect('admin/ListPitchType')->with('success','xoá sân bóng thành công');
    }

	// public extension
	public function ListExtension()
	{
		$data = DB::table('tbl_extension')->get();
		return view('admin.pitch.ListExtension',['data' => $data]);
	}
	public function AddExtension()
	{
		return view('admin.pitch.FormExtension');
	}
	public function InsertExtension(Request $request)
	{	
		$data = [
			'ex_name' => $request->ex_name,
		];
		$insert = DB::table('tbl_extension')->insert($data);
		return redirect('admin/extension')->with('success','Thêm mới tiện ích thành công');
	}
	public function EditExtension($ex_id){
		$extension = DB::table('tbl_extension')->where('ex_id',$ex_id)->first();
		return view('admin.pitch.EditExtension',['extension'=>$extension]);
	}
	public function UpdateExtension(Request $request,$ex_id){
		$data = [
			'ex_name' => $request->ex_name,
		];
		DB::table('tbl_extension')->where('ex_id',$ex_id)->update($data);
		return redirect('admin/extension')->with('success','cập nhật tiện ích thành công');
	}
	public function DeleteExtension($ex_id){
		$delete = DB::table('tbl_extension')->where('ex_id',$ex_id)->delete();
        return redirect('admin/extension')->with('success','xoá tiện ích thành công');
	}
}
