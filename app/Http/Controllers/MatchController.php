<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Models\MatchInfo;
use App\Models\Field;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class MatchController extends Controller
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
    public function create_match(){
        $cteam_info = Team::all();
        $cuser_info = User::all();
        $cmatch_info = MatchInfo::all();

        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.create_match')->with(compact('cmatch_info','cteam_info','cuser_info','field_count','user_count','team_count'));
    }

    public function insert_match(){
        $data = request()->validate([
            'match_time'=>'required',
            'match_team_level'=>'required',
            'match_desc'=>'required',
            'match_status'=>'required',
            'team_id'=>'required'
        ]);

        $match_info = new MatchInfo();
        $match_info->match_time = $data['match_time'];
        $match_info->match_team_level = $data['match_team_level'];
        $match_info->match_desc = $data['match_desc'];
        $match_info->match_status = $data['match_status'];
        $match_info->team_id = $data['team_id'];


        $match_info->save();
       
    	return redirect('/list-match')->with('success','Tạo tin thành công');
    }

    public function list_match(){
        $match = MatchInfo::all();
        $match_info = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->orderby('tbl_match.match_time','asc')->paginate(4);
        // $match_info2 = MatchInfo::join('users','users.id','=','tbl.match.user_id')->get();
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.list_match')->with(compact('match_info','match','field_count','user_count','team_count'));
    }



    public function history_match(){
        // $match_update = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')->join('users','users.id','=','tbl_match.user_id')
        // ->where('match_id',$match_id)->update(['match_id'=>'users.id']);
        
        $match_history = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('tbl_match.team_id', '=', Auth::user()->id)
        ->orderby('tbl_match.match_status','asc')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.history_match')->with(compact('match_history','field_count','user_count','team_count'));
    }

    public function match_mc(){
        $match_mc = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->where('match_team_level','0')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.match_mc')->with(compact('match_mc','field_count','user_count','team_count'));
    }
    public function match_tb(){
        $match_tb = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->where('match_team_level','1')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.match_tb')->with(compact('match_tb','field_count','user_count','team_count'));
    }
    public function match_tby(){
        $match_tby = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->where('match_team_level','2')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.match_tby')->with(compact('match_tby','field_count','user_count','team_count'));
    }
    public function match_tbk(){
        $match_tbk = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->where('match_team_level','3')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.match_tbk')->with(compact('match_tbk','field_count','user_count','team_count'));
    }
    public function match_k(){
        $match_k = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->where('match_team_level','4')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.match_k')->with(compact('match_k','field_count','user_count','team_count'));
    }
    public function match_km(){
        $match_km = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->where('match_status','0')
        ->where('tbl_match.match_time', '>=', date("m/d/Y"))
        ->where('match_team_level','5')->paginate(4);
        $field_count = Field::orderby('field_id')->paginate(1);
        $user_count = UserInfo::orderby('id')->paginate(1);
        $team_count = Team::orderby('team_id')->paginate(1);
        return view('pages.match.match_km')->with(compact('match_km','field_count','user_count','team_count'));
    }

    public function accept_macth($match_id){
        MatchInfo::where('match_id',$match_id)->update(['match_status'=>1]);
        session()->put('message','Đã chuyển trạng thái thành công');
        return redirect('/history-match');
        
    }
    public function waiting_for_match($match_id){
        MatchInfo::where('match_id',$match_id)->update(['match_status'=>0]);
        session()->put('message','Đã chuyển trạng thái thành công');
        return redirect('/history-match');
    }

    // end forntend

    public function all_match(){
        $this->AuthLogin();
        $all_team = Team::all();
        $all_user = User::all();
        $all_match = MatchInfo::join('tbl_team','tbl_team.team_id','=','tbl_match.team_id')
        ->orderby('tbl_match.match_status','desc')->paginate(4);
        return view('admin.match.all_match')->with(compact('all_team','all_user','all_match'));
    }
    public function delete_match($match_id){
        $this->AuthLogin();
        $match_info = MatchInfo::find($match_id);
        $match_info->delete();
        return redirect('/all-match')->with('success','xoá lời mời thành công');

    }
}
