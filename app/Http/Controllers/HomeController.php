<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Team;
use App\Models\MatchInfo;
use DB;
use App\Models\Field;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    //  đá về trang login nếu chưa đăng nhập thì k đc vào trang khác
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $list_pitch = DB::table('tbl_pitch')->get();
        $city = DB::table('city2')->where('cit_parent',0)->get();

        return view('home')->with(compact('list_pitch','city'));
    }
    // error_page
    public function error_page(){
        return view('errors.404');
    }

    public function search(){
        $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
        $city = isset($_GET['city']) ? $_GET['city'] : 0;
        $district = isset($_GET['district']) ? $_GET['district'] : 0;
        $ward = isset($_GET['ward']) ? $_GET['ward'] : 0;
        $street = isset($_GET['street']) ? $_GET['street'] : 0;
        $arr_city = DB::table('city2')->where('cit_parent',0)->get();
        
        $arr_street = [];
        $arr_ward = [];
        $arr_district = [];

        $search = DB::table('tbl_pitch')
        ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
        ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->get();
        $count = DB::table('tbl_pitch')
        ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
        ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->count();
        if($city != 0)
        {
            $search = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->get();

            $count = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->count();

            $arr_district = DB::table('district')->where('_province_id',$city)->get();
        }
        if($district != 0)
        {
            $search = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('pitch_district',$district)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->get();

            $count = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('pitch_district',$district)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->count();

            $arr_ward = DB::table('ward')->where('_district_id',$district)->get();
        }
        if($ward != 0)
        {
            $search = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('pitch_district',$district)
            ->where('pitch_ward',$ward)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->get();

            $count = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('pitch_district',$district)
            ->where('pitch_ward',$ward)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->count();

            $arr_street = DB::table('street')->where('_district_id',$district)->get();
        }
        if($street != 0)
        {
            $search = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('pitch_district',$district)
            ->where('pitch_ward',$ward)
            ->where('pitch_street',$street)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->get();

            $count = DB::table('tbl_pitch')
            ->join('tbl_admin','tbl_admin.id','=','tbl_pitch.pitch_manager')
            ->where('pitch_city',$city)
            ->where('pitch_district',$district)
            ->where('pitch_ward',$ward)
            ->where('pitch_street',$street)
            ->where('tbl_pitch.pitch_name','like','%'.$keywords.'%')->count();
        }
        return view('pages.search')->with(compact('search','arr_city','arr_district','arr_ward','arr_street','count'));
    }
}
