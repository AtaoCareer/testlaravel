@extends('zichans.base')

@section('content')

<div class="container">
<div class="page-header">
        <h1>资产系统管理</h1>
</div>	
    
   
	<p>
		<a href="{{ url('show') }}" class="btn btn-info btn-lg btn-block">基础信息</a>
	</p>
	<p>
		<a href="{{ url('check') }}" class="btn btn-success btn-lg btn-block">资产盘点</a>
	</p>
	<p>
		<a href="{{ url('#') }}" class="btn btn-danger btn-lg btn-block">机器报修</a>
	</p>
	
	
	
</div>
@endsection('content')