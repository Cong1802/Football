<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Field;
class TeamController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('/admin')->send();
        }
        
    }

    public function create_team(){
        $create_team = Team::all();
        $user_info = UserInfo::all();
        
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.team.create_team')->with(compact('create_team','user_info','field_count','user_count','team_count'));
    }

    public function insert_team(){
        $data = request()->validate([
            'team_name'=>'required',
            'team_address'=>'required',
            'team_level'=>'required',
            'team_desc'=>'required',
            'team_logo'=>'required|image',
            'team_phone'=>'required',

        ]);

        $imagePath = request('team_logo')->store('uploads','public');
        $Team = new Team();
        $Team->team_name = $data['team_name'];
        $Team->team_address = $data['team_address'];
        $Team->team_level = $data['team_level'];
        $Team->team_desc = $data['team_desc'];
        $Team->team_phone = $data['team_phone'];
        $Team->team_logo = $imagePath;



        $Team->save();
       
    	return redirect('/my-team/'.Auth::user()->id)->with('success','Tạo đội bóng thành công');
    }

    public function my_team($team_id){
        // lấy avata của user có id là 1
        // lấy id của team co
        $my_team = Team::all();
        $my_team_id = Team::find($team_id);
        $my_user_info = User::all();
        // $my_team_id = Team::where('team_id',$team_id)->get();



        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        
        return view('pages.team.my_team')->with(compact('my_team','my_team_id','my_user_info','field_count','user_count','team_count'));
    }


    public function update_team_infomation($team_id){
        $data = request()->validate([
            'team_name'=>'required',
            'team_address'=>'required',
            'team_level'=>'required',
            'team_desc'=>'required',
            'team_phone'=>'required',
            'team_logo'=>'required|image'

        ]);

        $team =  Team::find($team_id);
        $imagePath = request('team_logo')->store('uploads','public');

        $team->team_name = $data['team_name'];
        $team->team_address = $data['team_address'];
        $team->team_level = $data['team_level'];
        $team->team_desc = $data['team_desc'];
        $team->team_phone = $data['team_phone'];
        $team->team_logo = $imagePath;

        $team->save();
       
    	return redirect('/my-team/'.$team_id)->with('success','cập nhật thông tin thành công');
    }

    public function show_list_team(){
        $list_team = Team::join('users','tbl_team.team_id','=','users.team_id')
        ->orderby('users.id','asc')->paginate(4);
        $list_user_info = User::all();
        
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.team.list_team')->with(compact('list_team','list_user_info','field_count','user_count','team_count'));
    }


    // end frontend

    public function all_team(){
        $this->AuthLogin();
        $all_team = Team::join('users','tbl_team.team_id','=','users.team_id')
        ->orderby('users.id','asc')->paginate(4);
        $all_user_info = User::all();
        return view('admin.team.all_team')->with(compact('all_team','all_user_info'));
    }
    public function delete_team($team_id){
        $this->AuthLogin();
        $team = Team::find($team_id);
        $team->delete();
        return redirect('/all-team')->with('success','xoá team thành công');

    }

}
