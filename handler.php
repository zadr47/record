<?php
	$data = $_REQUEST;
	
	if(empty($data['record'])){
		//остановить выполнение обработчика
		header("Location:/");
	}

	$record = $data['record'];

	//$record можно заночить в бд
	$driver = 'mysql';				//тип бд
	$host = 'record';				//то что в url строке 
	$bd_user = 'root';				//логин от бд
	$charset = 'utf8';
	$pass = '';						//пароль от бд
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

//echo "$driver:host=$host;bdname=$bdname;charset=$charset";
//var_dump(PDO::getAvailableDrivers());
//phpinfo();

	try {  
		$DBH = new PDO("$driver:host=$host;bdname=$bd_user;charset=$charset",$bd_user,$pass,$options);
		echo "соединение прошло усешно!\nПрекрасно! Поздравляю!";
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}