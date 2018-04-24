<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use App\diemrl;
use App\notification;
use App\student;
use App\teacher;
use App\users;


class CovanController extends Controller
{
    public function index_lt(){
        return view('covan');
    }

    public function xem()
    {
        $data = diemrl::join('students','diemrl.msv','=','students.msv')->select('diemrl.msv','students.name','diemrl.thamgiahoatdong','diemrl.hienmau','diemrl.thiolympic','diemrl.nghiencuukhoahoc')->get();
    
        return view('covan')->with([
            'indi_data' => $data
        ]);
    }

    public function report(Request $req){
        $msv = $req->input('msv');
        $mess = $req->input('rptext');

        //$recvID = DB::table('students')->where('msv', '=',$msv)->value('user_id');
        
        $noti = new notification;
        $noti->sendID = 3;
        $noti->recvID = 2;
        $noti->description = $mess;
        $noti->status = 1;
        $noti->save();
        return redirect(route('covan'));
    }

    public function xemrp(){
        
        $data = DB::table('notification')->where('recvID','=',$user = Auth::user()->id)->where('status','=','1')->get();

        //DB::table('notification')->where('recvID','=',$user = Auth::user()->id)->where('status','=','1')->update(['status'=>0]);
        return view('covanxemrp')->with([
            'indi_data' => $data
        ]);
    }

    // public function guirp()
    // {

    //     $mess = 'Em gửi thầy điểm rèn luyện của các bạn trong lớp em';
    //     $noti = new notification;
    //     $noti->sendID = 3;
    //     $noti->recvID = 2;
    //     $noti->description = $mess;
    //     $noti->status = 1;
    //     $noti->save();
    //     return redirect(route('loptruong'));
    // }

    public function xoa(Request $req){
        // DB::table('notification')->where('recvID','=',Auth::user()->id)->where('status','=','1')->update(['status'=>0]);
       

        $id = $req->input('noti');
        DB::table('notification')->where('notiID', $id)->update(['status'=>0]);
         $data = DB::table('notification')->where('recvID','=',Auth::user()->id)->where('status','=','1')->get();
        return view('covanxemrp')->with([
            'indi_data' => $data
        ]);
    }
}
