<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ahr</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="/ahr/bower_components/bootstrap/dist/css/bootstrap.css" media="screen,projection" />
    <script src="/ahr/bower_components/bootstrap/dist/js/bootstrap.js"></script>
</head>
<style>
	.text-align_c{
		text-align: center !important;
	}
	.text-align_r{
		text-align: right !important;
	}
	.text-align_l{
		text-align: left !important;
	}
	.footer{
		position: absolute;
	    bottom: 0;
	    width: 100%;
	    height: 60px;
	    background-color: #f5f5f5;
	    border: 1px solid #EAEAEA;
	}
</style>
<body>
		<!-- header -->
        <header>
	    	<nav class="navbar navbar-default">
	    	  <div class="container-fluid">
	    	    <div class="navbar-header">
	    	      <a class="navbar-brand" href="#">
	    	        <p>logo</p>
	    	      </a>
	    	    </div>
	    	  </div>
	    	</nav>
        </header>
		<!-- main -->
        <main>
			 <div class="container" style="width:80%;">
				<div class="panel panel-default" style="background:#A9D5EA !Important; margin:auto;">
				  <div class="panel-body">
				  		<div style="text-align:center;">
				  			<!-- <img src="/ahr/assets/img/logo.png" class="img-thumbnail" width="200" > -->
				  			<a></a>
				  		</div>
					    <form style="width:80%; margin:auto;">
					      <div class="form-group">
					        <label for="exampleInputEmail1">ID(Email)</label>
					        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
					      </div>
					      <div class="form-group">
					        <label for="exampleInputPassword1">Password</label>
					        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					      </div>
					  	  <div class="form-group">
					        <label for="exampleInputPassword1">Password 確認用</label>
					        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					      </div>
					      <div class="checkbox">
					          <label>
					            <input type="checkbox"> 個人情報保護方針，利用規約に同意する
					          </label>
					        </div>
					      <div style="text-align:center;">
					      <button type="button" class="btn btn-info btn-lg" >Sign in</button>
					      </div>
					    </form>
				  </div>
				</div>
			 </div>
        </main>
		<!-- footer -->
        <footer class="footer">
	      <div class="container">
	      </div>
	    </footer>

</body>
</html>