<?php

$output = [];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES['file']) && isset($_FILES['file']['tmp_name']))
{
	$allowed =  array('nbu');
	$filename = $_FILES['file']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
		$output['status'] = 'error';
		$output['error'] = 'Supports only nbu format';
		echo json_encode($output);
		exit;
	}

	$contacts = file_get_contents($_FILES["file"]["tmp_name"]);


	$name_re = "/((?:N;).*(?:8BIT:))(.*)/"; 
	$tel_re = "/((?:TEL;).*(?:8BIT:))(.*)/"; 

	preg_match_all($name_re, $contacts, $name_matches);
	preg_match_all($tel_re, $contacts, $number_matches);


	$contacts = [];

	$name_matches = end($name_matches);
	$number_matches = end($number_matches);


	for($i=0;$i<count($name_matches);$i++){
		$temp = [];
		$name = explode(';',$name_matches[$i]);
		$name = array_reverse($name);
		$name = array_map('trim', $name);
		$name = implode(" ",$name);
		$temp['name'] = $name;
		$temp['number'] = trim($number_matches[$i],"\r");
		$contacts[]=$temp;
	}

	$output['status'] = 'success';
	$output['contacts'] = $contacts;
	echo json_encode($output);
	exit;

}else {
	$output['status'] = 'error';
	$output['error'] = 'Method not allowed';
	echo json_encode($output);
	exit;
}