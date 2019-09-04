<?php
	$data = $_REQUEST;
	
	if(empty($data['record'])){
		//остановить выполнение обработчика
		header("Location:/");
	}

	$record = $data['record'];

	//var_dump(PDO::getAvailableDrivers());
	//echo "<br />";

	//ЭТО РАБОТАЕТ НА HEROKU
	$driver = 'pgsql';				
	$host = 'ec2-54-246-121-32.eu-west-1.compute.amazonaws.com';				
	$bd_name = 'dfgngu63o3bvv0';
	$user = "siunpcbvdiimna";
	$charset = 'utf8';
	$pass = '5aceb95a0d56b72ac10c3ed0e3fb0465374f7a59d71c2727e47e67ac9853c7a1';
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];



	try {  
		$DBH = new PDO("$driver:host=$host;dbname=$bd_name",$user,$pass);
		echo "соединение прошло усешно!\nПрекрасно! Поздравляю!";
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}