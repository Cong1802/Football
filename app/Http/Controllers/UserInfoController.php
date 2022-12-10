<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\Field;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class UserInfoController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('/admin')->send();
        }
        
    }
    public function user_infomation($id){

        $user_info = UserInfo::where('id',$id)->get();

        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.user_infomation')->with(compact('user_info','field_count','user_count','team_count'));;


    }


    public function update_user_infomation($id){
        $data = request()->validate([
            'team_id'=>'required',
            'email'=>'required',
            'name'=>'required',
            'user_phone'=>'required',
            'user_image'=>'required|image',
            'user_gender'=>'required',
            'user_date_of_birth'=>'required',
        ]);

        $UserInfo =  UserInfo::find($id);
        $imagePath = request('user_image')->store('uploads','public');

        $UserInfo->team_id = $data['team_id'];
        $UserInfo->email = $data['email'];
        $UserInfo->name = $data['name'];
        $UserInfo->user_phone = $data['user_phone'];
        $UserInfo->user_image = $imagePath;
        $UserInfo->user_gender = $data['user_gender'];
        $UserInfo->user_date_of_birth = $data['user_date_of_birth'];

  


        $UserInfo->save();
       
    	return redirect('/user-infomation/'.Auth::user()->id)->with('success','cập nhật thông tin thành công');
    }

    // end frontend

    // start backend

    public function all_user(){
        $this->AuthLogin();
        $all_user = User::paginate(2);
        return view('admin.user.all_user')->with(compact('all_user'));;
    }
    // public function add_user(){
    //     $add_user = User::all();
    //     return view('admin.user.add_user')->with(compact('add_user'));;
    // }

    // public function insert_user(){
    //     $data = request()->validate(
    //         [
    //         'name'=>'required|unique:users',
    //         'email'=>'required|unique:users',
    //         // 'user_phone'=>'required',
    //         // 'user_image'=>'required|image|mimes:jpeg,jpg,png,gif|max:2048',
    //         'password'=>'required|min:8'
    //         ],
    //         [
    //             'name.unique' => 'Tên đã tồn tại làm ơn điền tên user khác',
    //             'email.unique' => 'Email đã tồn tại làm ơn điền email khác',
    //             // 'user_phone.required' => 'Làm ơn điền số điện thoại',
    //             // 'user_image.required' => 'Làm ơn thêm hình ảnh',
    //             'password.min '=> 'Mật khẩu phải trên 8 ký tự'
    //         ]
    //     );

    //     $user_info_b = new UserInfo();
    //     $user_info_b->name = $data['name'];
    //     $user_info_b->email = $data['email'];
    //     // $user_info_b->user_phone = $data['user_phone'];
    //     $user_info_b->password = Hash::make($data['password']);

    //     // $get_image = $data['user_image'];

    //     // $path = 'public/uploads/';
    //     //them hinh anh

    //     // $get_name_image = $get_image->getClientOriginalName();
    //     // $name_image = current(explode('.',$get_name_image));
    //     // $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    //     // $get_image->move($path,$new_image);
    //     // $user_info_b->user_image = $new_image;

    //     $user_info_b->save();
       
    // 	return redirect('/all-user')->with('success','Thêm user thành công');
    // }



    public function edit_user($id){
        $this->AuthLogin();

        $user_info_b = User::all();
        $user_edit = User::find($id);
    	return view('admin.user.edit_user')->with(compact('user_info_b','user_edit'));
    }

    public function update_user($id){
        $this->AuthLogin();

        $data = request()->validate([
            'name'=>'required',
            'email'=>'required',
            'user_phone'=>'required',
        ]);

        $user_info_b = UserInfo::find($id);
        $user_info_b->name = $data['name'];
        $user_info_b->email = $data['email'];
        $user_info_b->user_phone = $data['user_phone'];

        $user_info_b->save();
       
    	return redirect('/all-user')->with('success','cập nhật user thành công');
    }

    public function delete_user($id){
        $this->AuthLogin();

        $user = User::find($id);
        $user->delete();
        return redirect('/all-user')->with('success','xoá user thành công');

    }

}
