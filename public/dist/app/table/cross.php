<?php
 
header('Access-Control-Allow-Origin: http://base.com');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
	<script src="../../scripts/jquery.jsonp-2.3.0.js"></script>
</head>
<script>
 $(document).ready(function(){
	$("#getDifferentDomainData").click(function(){
			ajaxCall("http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js");
		});

	function ajaxCall(target){

		//發出 ajax call
		var data = $.ajax({
			type: "POST",
			url: target,
		});

		//成功得到資料
		data.success(function( msg ) {
			$("#result").html(msg);
		});

		//取得資料失敗
		data.error(function( msg ) {
			$("#result").html("fail getting data");
		});
     }
  });
</script>
<body>
	<button id="getDifferentDomainData">點我抓資料</button>
	<div id="result"></div>
</body>
</html>

