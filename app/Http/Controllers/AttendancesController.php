<?php

 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Http\Requests;
 use App\CsvAttendance;

 //useしないと 自動的にnamespaceのパスが付与されるのでuse
 use SplFileObject;
  
 class AttendancesController extends Controller
 {
    protected $csvimport = null;
 
     public function __construct(CsvAttendance $csvimport)
    {
        $this->csvimport = $csvimport;
    }
  
     public function index()
     {
         return view('inport');
     }

     /**
      * CSVインポート
      *
      * @param  Request
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request)
     {
        //  dd($request->file('csv_file'));
        if(!empty($request->file('csv_file'))){
        // if(isset($_POST['csv_file'])){

            //全件削除
            //   CsvAttendance::truncate();
        
            // ロケールを設定(日本語に設定)
            setlocale(LC_ALL, 'ja_JP.UTF-8');
        
            // アップロードしたファイルを取得
            // 'csv_file' はビューの inputタグのname属性
            $uploaded_file = $request->file('csv_file');

            //  // アップロードしたファイルの絶対パスを取得
            $file_path = $request->file('csv_file')->path($uploaded_file);

            //SplFileObjectを生成
            $file = new SplFileObject($file_path);
            

            //SplFileObject::READ_CSV が最速らしい
            $file->setFlags(SplFileObject::READ_CSV);

            $row_count = 1;
            
            //取得したオブジェクトを読み込み
            foreach ($file as $row)
            {
                // 最終行の処理(最終行が空っぽの場合の対策
                if ($row === [null]) continue; 

                // 1行目のヘッダーは取り込まない
                if ($row_count > 1)
                {
                    // CSVの文字コードがSJISなのでUTF-8に変更
                    $year = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
                    $mouth = mb_convert_encoding($row[1], 'UTF-8', 'SJIS');
                    $day = mb_convert_encoding($row[2], 'UTF-8', 'SJIS');
                    $work_start = mb_convert_encoding($row[3], 'UTF-8', 'SJIS');
                    $work_end = mb_convert_encoding($row[4], 'UTF-8', 'SJIS');
                    $break_time = mb_convert_encoding($row[5], 'UTF-8', 'SJIS');
                    $user_id = mb_convert_encoding($row[6], 'UTF-8', 'SJIS');
                    
                    //1件ずつインポート
                    CsvAttendance::insert(array(
                            'year' => $year,
                            'mouth' => $mouth, 
                            'day' => $day, 
                            'work_start' => $work_start,
                            'work_end' => $work_end,
                            'break_time' => $break_time,
                            'user_id' => $user_id
                        ));
                }
                //  dd($row);
                $row_count++;
                
            }
            return view('inport')->with('status','勤務表の読み込みが完了しました。');

        }else{
            return back()->with('status','ファイルが選択されていません。');
        }
                 
    }
 }