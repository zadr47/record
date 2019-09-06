<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/function.php');
	
	//create_table_records();

	$data = $_REQUEST;
	
	if(empty($data['record'])){
		//остановить выполнение обработчика
		header("Location:/");
	}

	$conn = conn();
	$record = $data['record'];

	/*
	//ИМЕНОВЫННЫЙ PLACEHOLDER
	$sql = "INSERT INTO records (record) VALUES (:record);";	//sql запрос 
	$snapshot = $conn->prepare($sql);							//снимок запроса
	$snapshot->execute([':record' => $record]);					//выполнение снмка запроса со значением
	*/

	//ПОЗИЦИОННЫЙ PLACEHOLDER
	$sql = "INSERT INTO `records` (`record`) VALUES (?);";		//sql запрос 
	$snapshot = $conn->prepare($sql);							//снимок запроса
	$snapshot->execute([$record]);								//выполнение снмка запроса со значением

	$sql = "SELECT * FROM `records`";
	$result_sql = $conn->query($sql);
	$data_DB = $result_sql->fetchAll(PDO::FETCH_ASSOC);
	
	echo "<br />";
	foreach($data_DB as $k => $v){
		echo $v['record'];
		echo "<br />";
	}


