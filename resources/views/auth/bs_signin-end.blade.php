@extends('bs_layout.bs_layout')

@section('main')
<main>
	 <div class="container" style="background:#FFF; height:100vh;">
		<div  style="width:500px; margin:auto; border:0px !important; margin-top:70px;">
		  <div class="panel-body">
		  		<div class="row" style="text-align:center;">
		  		  <div class="col-md-12">
		  			<img src="assets/img/sign-end.png" height="250"  alt="">
		  		  </div>
		  		</div>
		  </div>
		  <div class="col-md-12 text-center" style="margin-top:10px;">
		  		   <a href="{{ url('bs_info') }}"  class="btn btn-info btn-lg ahr-button_1" style="background:#00A6EA; border-radius:0px;">企業情報入力画面へ移動</a>
		  </div>
		</div>
	 </div>
</main>
@endsection