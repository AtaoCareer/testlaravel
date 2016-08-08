@extends('zichans.base')

@section('content')

<div class="container">
<div class="page-header">
        <h1>设备发放</h1>
</div>

<form action="{{ url('distributeSave') }}" method="post">
		{!! csrf_field() !!}
  <div class="form-group">
    <label for="zichanNum">资产编号</label>
    <input type="text" class="form-control" id="zichanNum" name="zichanNum" value="{{  $id }}" readonly="readonly">
  </div>
  <div class="form-group">
    <label for="bumen">部门</label>
    <select name="bumen" id="bumen" class="form-control" onchange = "getA()">
	<option value="noBumenValue" selected="selected">请选择部门</option>
  	@foreach($bumens as $bumenss)
  		<option value="{{ $bumenss->bumen }}">{{ $bumenss->bumen }}</option>
  	@endforeach
	</select>
  </div>
  <div class="form-group">
    <label for="keshi">科室</label>
	<select name="keshi" id="keshi" class="form-control">
		<option value="noKeshiValue" selected="selected">请选择科室</option>
	</select>
  </div>
  <div class="form-group">
    <label for="user">使用者</label>
    <input type="text" class="form-control" id="user" name="user" value="">
  </div>
  <div class="form-group">
    <label for="roomNum">房间号</label>
    <input type="text" class="form-control" id="roomNum" name="roomNum" value="">
  </div>
<!--   <div class="form-group"> -->
<!--     <label for="description">描述</label> -->
<!--     <input type="text" class="form-control" id="description" name="description" value=""> -->
<!--   </div> -->
<!--   <div class="form-group"> -->
<!--     <label for="serialNum">序列号</label> -->
<!--   	<input type="text" class="form-control" id="serialNum" name="serialNum" value=""> -->
<!--   </div> -->
  	<!-- 可能还会有别的数据添加进来 -->
  <button type="submit" class="btn btn-success btn-lg  btn-block" >提交</button>
</form>
</div>
@endsection('content')   