@extends('layouts.app')

@section('content')
{{--バリデーションエラー処理 --}}
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<div class="container">
            <div class="content">
    
                <div class="title">Bookingcurve</div>
 
                <h4>CSVファイルを選択してください</h4>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                </div>
                
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="csv_file" id="csv_file">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-success">保存</button>
                    </div>
                </form>

 
            </div>
        </div>
@endsection