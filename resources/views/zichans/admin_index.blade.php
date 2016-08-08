@extends('zichans.base')

@section('content')

<div class="container">
<div class="page-header">
        <h2>资产系统管理<small>--管理员</small></h2>
</div>	
    
   
	<p>
		<a href="{{ url('show') }}" class="btn btn-info btn-lg btn-block">基础信息</a>
	</p>
	<p>
		<a href="{{ url('check') }}" class="btn btn-success btn-lg btn-block">资产盘点</a>
	</p>
	<p>
		<a href="{{ url('distribute') }}" class="btn btn-primary btn-lg btn-block">设备发放</a>
	</p>
	
	<p>
		<a href="{{ url('#') }}" class="btn btn-warning btn-lg btn-block">设备回收</a>
	</p>
	
	
	
</div>
@endsection('content')