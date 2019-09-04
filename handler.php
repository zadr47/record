<?php
	$data = $_REQUEST;
	
	if(empty($data['record'])){
		//остановить выполнение обработчика
		header("Location:/");
	}

	$record = $data['record'];

	var_dump(PDO::getAvailableDrivers());
	//$record можно заночить в бд
	$driver = 'mysql';				//тип бд
	$host = 'ec2-54-246-121-32.eu-west-1.compute.amazonaws.com';				//то что в url строке 
	$bd_user = 'dfgngu63o3bvv0';				//логин от бд
	$charset = 'utf8';
	$pass = '5aceb95a0d56b72ac10c3ed0e3fb0465374f7a59d71c2727e47e67ac9853c7a1';						//пароль от бд
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

//echo "$driver:host=$host;bdname=$bdname;charset=$charset";
//phpinfo();

	try {  
		$DBH = new PDO("$driver:host=$host;bdname=$bd_user;charset=$charset",$bd_user,$pass,$options);
		echo "соединение прошло усешно!\nПрекрасно! Поздравляю!";
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}