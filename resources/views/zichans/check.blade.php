@extends('zichans.base')

@section('content')

<div class="container">
<div class="page-header">
        <h1>资产盘点</h1>
</div>

<form action="{{ url('checkSave') }}" method="post">
		{!! csrf_field() !!}
  <div class="form-group">
    <label for="zichanNum">资产编号</label>
    <input type="text" class="form-control" id="zichanNum" name="zichanNum" value="{{  $id }}" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="bumen">部门</label>
<!--     <input type="text" class="form-control" id="bumen" name="bumen" value="{{  $bumen }}"> -->
    <select name="bumen" id="bumen" class="form-control" onchange = "getA()">
  	@foreach($bumens as $bumenss)
  		@if($bumenss->bumen == $bumen)
  		<option value="{{ $bumenss->bumen }}" selected="selected">{{ $bumenss->bumen }}</option>
  		@else
  		<option value="{{ $bumenss->bumen }}">{{ $bumenss->bumen }}</option>
  		@endif
  	@endforeach
	</select>
  </div>
  <div class="form-group">
    <label for="keshi">科室</label>
    <input type="hidden"id="keshiDefault" name="keshiDefault" value="{{  $keshi }}">
	<select name="keshi" id="keshi" class="form-control">
		<option value="{{ $keshi }}" selected="selected">{{ $keshi }}</option>
	</select>
  </div>
  <div class="form-group">
    <label for="user">使用者</label>
    <input type="text" class="form-control" id="user" name="user" value="{{  $user }}">
  </div>
  <div class="form-group">
    <label for="roomNum">房间号</label>
    <input type="text" class="form-control" id="roomNum" name="roomNum" value="{{  $roomNum }}">
  </div>
  <div class="form-group">
    <label for="description">描述</label>
    <input type="text" class="form-control" id="description" name="description" value="{{  $description }}" readonly="readonly">
  </div>
  	<input type="hidden" id="serialNum" name="serialNum" value="{{ $serialNum }}">
  	<!-- 可能还会有别的数据添加进来 -->
  <button type="submit" class="btn btn-success btn-lg  btn-block" >提交</button>
</form>
</div>
@endsection('content')   