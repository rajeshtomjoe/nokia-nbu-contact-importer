<?php

$output = [];

if(!isset($_SESSION['access_token'])){
	$output['status'] = 'redirect';
	echo json_encode($output);
	exit;
}

require_once 'vendor/autoload.php';

use rajeshtomjoe\googlecontacts\factories\ContactFactory;

if(!empty($_POST['name']) && !empty($_POST['phoneNumber']))
{
	try {
		ContactFactory::create($_POST['name'],$_POST['phoneNumber']);
		$output['status'] = 'success';
		echo json_encode($output);
		exit;
	} catch (Exception $e) {
		$output['status'] = 'error';
		$output['error'] = $e->getMessage();
		echo json_encode($output);
		exit;
	}
	
	
}else {
	$output['status'] = 'error';
	$output['error'] = 'All fields required';
	echo json_encode($output);
	exit;
}