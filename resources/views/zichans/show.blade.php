@extends('zichans.base')

@section('content')

<div class="container">
<div class="page-header">
        <h1>基本信息</h1>
</div>
<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-striped table-hover">
				
				<tbody>
					<tr>
						<td>
							<h4>资产编号</h4>
						</td>
						<td>
							<h4>{{ $id }}</h4>
						</td>
						
					</tr>
					<tr class="success">
						<td>
							<h4>部门</h4>
						</td>
						<td>
							<h4>{{ $bumen }}</h4>
						</td>
						
					</tr>
					<tr>
						<td>
							<h4>科室</h4>
						</td>
						<td>
							<h4>{{ $keshi }}</h4>
						</td>
						
					</tr>
					<tr class="warning">
						<td>
							<h4>使用者</h4>
						</td>
						<td>
							<h4>{{ $user }}</h4>
						</td>
						
					</tr>
					<tr>
						<td>
							<h4>房间号</h4>
						</td>
						<td>
							<h4>{{ $roomNum }}</h4>
						</td>
						
					</tr>
					<tr class="info">
						<td>
							<h4>描述</h4>
						</td>
						<td>
							<h4>{{ $description }}</h4>
						</td>
						
					</tr>
					<tr>
						<td>
							<h4>序列号</h4>
						</td>
						<td>
							<h4>{{ $serialNum }}</h4>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
    
	
	
	
</div>
@endsection('content')
