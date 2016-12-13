<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

function create_connection()
{
  $link = mysql_connect("localhost", "root", "")
    or die("無法建立資料連接<br><br>" . mysql_error());
 
  mysql_query("SET NAMES utf8");
	  	
  return $link;
}

function execute_sql($database, $sql, $link)
{
  $db_selected = mysql_select_db($database, $link)
    or die("開啟資料庫失敗<br><br>" . mysql_error($link));
				 
  $result = mysql_query($sql, $link);
 
  return $result;
}

//回傳json必須加header

 //建立資料連接
$link = create_connection();

header('Content-Type: application/json; charset=utf-8');

	$sql = "select * from sell";
	
	$result = execute_sql("pos", $sql, $link);
    $into_goods = null;
    	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    		$into_goods[] = array(
    				'id' => $row['id'],
    				'invoice_number'  => $row['invoice_number']	
    		  );
    	}
     //      $data[] = array(
     //       'TotalRows' => $total_rows,
    	//    'Rows' => $into_goods
    	// );


echo json_encode($into_goods);


?>