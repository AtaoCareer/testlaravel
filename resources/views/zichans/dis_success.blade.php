@extends('zichans.base')

@section('content')
<div class="container">
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><a href="{{ url('show') }}" class="alert-link">发放成功！！</a></strong>

</div>
</div>
@endsection('content')