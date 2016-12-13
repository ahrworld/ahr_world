<?php
	#Include the connect.php file
	include('connect.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	mysql_query("SET NAMES utf8");

	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}

	$pagenum = $_GET['pagenum'];
	$pagesize = $_GET['pagesize'];
	$start = $pagenum * $pagesize;
	$query = "SELECT * FROM
(
SELECT  CONCAT('SL', s.id) id,
        s.id as aid,
        s.user_id,
				s.customer_id,
				s.invoice_number,
				s.total,
				s.tax,
				s.sales_tax,
				s.total_amount,
				s.create_time,
				s.`status` as `status1`,
				CASE WHEN s.`status` = 0 THEN '未收款' ELSE '已收款'  END AS  `status`,
        s.checkout_id,
				s.description,
				s.closed,
				s.create_income_time,
				s.income_personnel,
				s.delivery,
				s.income_id,
				null customer_name,
				null customer_contact,
				null total_balance,
				null total_deductions,
				`user`.id as ud,
				`user`.username,
				customer.id as cd,
				customer.`name`
from sell s   INNER JOIN `user` ON `user`.id = s.user_id
INNER JOIN customer ON customer.id = s.customer_id
WHERE s.`status` = 0

UNION ALL
SELECT  CONCAT('PY', P.id),
        p.id as aid,
				p.user_id,
				null,
				p.invoice_number,
				null,
				null,
				null,
				p.total_amount,
				p.create_time,
				p.`status` as `status1`,
				CASE
					WHEN p.`status` = 0 THEN '未收款'  ELSE '已收款' END AS `status`,
				null,
				null,
				p.description,
				null,
				p.create_income_time,
				null,
				null,
				null,
				null,
				p.total_balance,
				p.total_deductions,
				`user`.id as ud,
				`user`.username,
				p.customer_contact,
				p.customer_name
from pre_payment p
INNER JOIN `user` ON `user`.id = p.user_id
WHERE p.`status` = 0
) abc
ORDER BY aid DESC ;
";



	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
	$rows = mysql_query($sql);
	$rows = mysql_fetch_assoc($rows);
	$total_rows = $rows['found_rows'];
	$into_goods = null;
	// get data and store in a json array
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$into_goods[] = array(
				'id' => $row['id'],
				'name' => $row['name'],
				'invoice_number'  => $row['invoice_number'],
				'status' => $row['status'],
				'total_amount' => $row['total_amount'],
				'create_time' => $row['create_time'],
				'description' => $row['description'],
				'username' => $row['username']
		  );
	}
      $data[] = array(
       'TotalRows' => $total_rows,
	   'Rows' => $into_goods
	);
	echo json_encode($data);
?>