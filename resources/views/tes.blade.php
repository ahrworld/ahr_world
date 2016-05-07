<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<script>
	$(document).ready(function(e) {
	    $('.language .add').click(function(){
	        $('.language .append').append($('<input name="language[]" class="form-control" value="test">'));
	    });
	});
</script>
<body>
	<form class="form_a" action="{{url('/business_a')}}" method="POST" >
	{{ csrf_field() }}
	<div class="language">
	    <div class="append">
	    </div>
	    <button type="button" class="add">add Button</button>

	    <input type="submit" value="submit">
    </div>
	</form>
</body>
</html>