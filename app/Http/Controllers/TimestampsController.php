<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Timestamp;
use App\CsvAttendance;
use Carbon\Carbon;

class TimestampsController extends Controller
{
    public function list(){

        $timestamp = CsvAttendance::get();  
        
        return view('list',['timestamp' => $timestamp]);
    
    }

    public function create(){

        return view('create');
    }

    public function store(Request $request){

        $today = Carbon::today();
        $old_today = DB::table('csv_attendances')
            ->where('user_id', \Auth::user()->id)->latest()->first();
            // dd($old_today);
        // if ($old_today) {
        //     $oldTimestampPunchIn = new Carbon($old_today->punch_in);
        //     $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
        // }
        // if(($today == $oldTimestampDay) || empty($old_today->punch_out)){
        //     return back()->with('status','今日の登録は完了しているかすでに出勤打刻がされています');
        // }
        try{
            $timestamp = new CsvAttendance;
            // $timestamp->user_id = \Auth::user()->id;
            $timestamp->punch_in = Carbon::now();
            $timestamp->timestamps = false;
            $timestamp->save();
            dd($timestamp);

            \DB::commit();

            return redirect(route('list'));
		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
        }
        
    }

    public function update(Request $request){

        $done_punchout = DB::table('csv_attendances')
        ->where('user_id', \Auth::user()->id)->latest()->first();
        if(!empty($done_punchout->punch_out)){
            return back()->with('status','既に退勤打刻がされています。');
        }
        try{
            $timestamp = DB::table('csv_attendances')
              ->where('user_id', \Auth::user()->id)
              ->update(['punch_out' => Carbon::now()
                        ]);

            //下記でもUPDATE処理を書ける
            // $timestamp->user_id = \Auth::user()->id;
            // $timestamp = Timestamp::where('user_id',Auth::user()->id);
            // $timestamp->punch_in = Carbon::now();
            // $timestamp->save();
            // -------------------------------
            \DB::commit();

            return redirect(route('list'));
		} catch (\Exception $e) {
			// エラー発生時は、DBへの保存処理が無かったことにする（ロールバック）
			\DB::rollBack();
			throw $e;
        }
        
    }
}
