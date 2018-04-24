<?php

namespace App\Http\Controllers;

use App\diemrl;
use App\notification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoptruongController extends Controller
{
    public function index_lt()
    {
        return view('loptruong');
    }

    public function tao(Request $request)
    {
        $user = Auth::user();
        $user->student();
        if (!DB::table('diemrl')->where('msv', '=', $user->student->msv)->exists()) {
            $diemrl = new diemrl();
            $diemrl->msv = $user->student->msv;
            $diemrl->thamgiahoatdong = $request->thamgiahoatdong;
            $diemrl->hienmau = $request->hienmau;
            $diemrl->thiolympic = $request->thiolympic;
            $diemrl->nghiencuukhoahoc = $request->nghiencuukhoahoc;
            $diemrl->save();
        } else {
            DB::table('diemrl')->where('msv', '=', $user->student->msv)
                ->update(
                    [
                        'msv' => $user->student->msv,
                        'thamgiahoatdong' => $request->thamgiahoatdong,
                        'hienmau' => $request->hienmau,
                        'thiolympic' => $request->thiolympic,
                        'nghiencuukhoahoc' => $request->nghiencuukhoahoc
                    ]);
        }

        return redirect(route('loptruong'));
    }

    public function xem()
    {
        $data = diemrl::join('students', 'diemrl.msv', '=', 'students.msv')->select('diemrl.msv', 'students.name', 'diemrl.thamgiahoatdong', 'diemrl.hienmau', 'diemrl.thiolympic', 'diemrl.nghiencuukhoahoc')->get();

        return view('loptruongxem')->with([
            'indi_data' => $data
        ]);
    }

    public function report(Request $req)
    {
        $msv = $req->input('msv');
        $mess = $req->input('rptext');

        $recvID = DB::table('students')->where('msv', '=', $msv)->value('user_id');

        $noti = new notification;
        $noti->sendID = 2;
        $noti->recvID = $recvID;
        $noti->description = $mess;
        $noti->status = 1;
        $noti->save();
        return redirect(route('loptruong'));
    }

    public function guirp()
    {

        $mess = 'Em gửi thầy điểm rèn luyện của các bạn trong lớp em';
        $noti = new notification;
        $noti->sendID = 2;
        $noti->recvID = 3;
        $noti->description = $mess;
        $noti->status = 1;
        $noti->save();
        return redirect(route('loptruong'));
    }

    public function xemrp()
    {
        
        $data = DB::table('notification')->where('recvID', '=', $user = Auth::user()->id)->where('status', '=', '1')->get();

        DB::table('notification')->where('recvID', '=', $user = Auth::user()->id)->where('status', '=', '1')->update(['status' => 0]);
        return view('loptruongxemrp')->with([
            'indi_data' => $data
        ]);
    }
}
