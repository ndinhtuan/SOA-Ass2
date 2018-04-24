<?php

namespace App\Http\Controllers;
use App\diemrl;
use App\notification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SinhvienController extends Controller
{
    public function index_sv(){
        return view('sinhvien');
    }

    function tao(Request $request){
        $user = Auth::user();
        $user->student();
       
        if(!DB::table('diemrl')->where('msv','=',$user->student->msv)->exists()){
            $diemrl = new diemrl;
            $diemrl->msv = $request->msv;
            $diemrl->thamgiahoatdong = $request->thamgiahoatdong;
            $diemrl->hienmau = $request->hienmau;
            $diemrl->thiolympic = $request->thiolympic;
            $diemrl->nghiencuukhoahoc = $request->nghiencuukhoahoc;
            $diemrl->save();
        } else {
            DB::table('diemrl')->where('msv','=',$user->student->msv)->update(['msv' => $user->student->msv,'thamgiahoatdong'=> $request->thamgiahoatdong,'hienmau'=>$request->hienmau,'thiolympic'=>$request->thiolympic,'nghiencuukhoahoc'=>$request->nghiencuukhoahoc]);
        }
        
        return redirect(route('svxem'));
    }

    public function xem()
    {
        $user = Auth::user();
        $data = diemrl::join('students','diemrl.msv','=','students.msv')->select('diemrl.msv','students.name','diemrl.thamgiahoatdong','diemrl.hienmau','diemrl.thiolympic','diemrl.nghiencuukhoahoc')->where('diemrl.msv','=',$user->student->msv)->get();

        return view('svxem')->with([
            'indi_data' => $data
        ]);
    }

    public function xemrp(){

        
        $data = DB::table('notification')->where('recvID','=',Auth::user()->id)->where('status','=','1')->get();

        DB::table('notification')->where('recvID','=',Auth::user()->id)->where('status','=','1')->update(['status'=>0]);
        return view('svxemrp')->with([
            'indi_data' => $data
        ]);
    }
}
