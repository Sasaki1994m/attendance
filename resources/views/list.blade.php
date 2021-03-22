@extends('layouts.app')

@section('content')

{{-- リアルタイム時刻停止中（再開したい場合は「RealtimeClockArea2」をidタグに） --}}
<p class="times" id="RealtimeClockArea2"></p>
<table class="table">

<thead class="thead-dark">
    <tr>
<div class="work_time">
  <button type="button" class="work_button" onclick="location.href='{{ route('timestamps.create',['user_id' => Auth::user()->name]) }}'" >
  勤怠を登録する</button> 
</div>
      <th scope="col"></th>
      <th scope="col">No.</th>
      <th scope="col">出勤者</th>
      <th scope="col">開始予定時間</th>
      <th scope="col">終了予定時間</th>
      <th scope="col">出勤打刻時刻</th>
      <th scope="col">退勤打刻時刻</th>
      <th scope="col">休憩時間</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($timestamp as $value)
    <tr>
      <th scope="row"></th>
      <td>{{ $i }}</td>
      <td>{{ $value->user->name }}</td>
      <td>{{ $value->work_start }}</td>
      <td>{{ $value->work_end }}</td>
      <td>{{ $value->punch_in }}</td>
      <td>{{ $value->punch_out }}</td>
      <td>{{ $value->break_time }}</td>
    </tr>
    <?php $i++ ?>
    @endforeach
  </tbody>
</table>



@endsection