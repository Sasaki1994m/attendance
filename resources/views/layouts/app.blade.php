<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>出勤者一覧</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Styles -->
    <!-- ヘッダーのcss -->
  <link href="{{ asset('css/header.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.header')

<style>
.table{
  margin-left: auto;
  margin-right: auto;
  width: 80%;
  margin-top: 80px;
} 
#RealtimeClockArea2{
    margin-top: 20px;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 50px;
    font-family: ui-monospace;
}
td{
  text-align: center;
}
th{
  text-align: center;
}
.work_time{
  text-align: center;
}
button.work_button{
  margin:0px 20px;
  position: relative;
  display: inline-block;
  font-weight: bold;
  text-decoration: none;
  color: #000000;
  text-shadow: 0 0 5px rgba(255, 255, 255, 0.73);
  padding: 0.3em 0.5em;
  background: #00bcd4;
  border-top: solid 3px #00a3d4;
  border-bottom: solid 3px #00a3d4;
  transition: .4s;
  width:150px;
  height:50px;
}

button.work_button{
  text-shadow: -6px 0px 15px rgba(255, 255, 240, 0.83),
               6px 0px 15px rgba(255, 255, 240, 0.83);
}
.container{
  margin-left: auto;
  margin-right: auto;
  width: 65%;
}

</style>
<main>
    @yield('content')
</main>
@include('layouts.footer')
<script>
function set2fig(num) {
   // 桁数が1桁だったら先頭に0を加えて2桁に調整する
   var ret;
   if( num < 10 ) { ret = "0" + num; }
   else { ret = num; }
   return ret;
}
function showClock2() {
   var nowTime = new Date();
   var nowFullYear = set2fig( nowTime.getFullYear() );
   var nowMonth = set2fig( nowTime.getMonth() + 1 );
   var nowDate = set2fig(  nowTime.getDate() );
   var nowHour = set2fig( nowTime.getHours() );
   var nowMin  = set2fig( nowTime.getMinutes() );
   var nowSec  = set2fig( nowTime.getSeconds() );
   var msg = nowFullYear + "年" + nowMonth + "月" +  nowDate + "日" + nowHour + "時" + nowMin + "分" + nowSec + " 秒";
   document.getElementById("RealtimeClockArea2").innerHTML = msg;
}
setInterval('showClock2()',1000);

//csvでインポートするためのjQueryを記述
// ファイルを選択すると、コントロール部分にファイル名を表示
    $('.custom-file-input').on('change',function(){
        $(this).next('.custom-file-label').html($(this)[0].files[0].name);
    })
</script>
</body>
</html>