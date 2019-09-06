<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
	
	$data = $_REQUEST;
	
	if(empty($data['record'])){
		//остановить выполнение обработчика
		header("Location:/");
	}

	$record = $data['record'];
	$conn = conn();

	/*
	$sql = "INSERT INTO records (record) VALUES (:record);";
	$snapshot = $conn->prepare($sql);
	$snapshot->execute([':record' => $record]);
	*/

	$sql = "INSERT INTO records (record) VALUES (?);";
	$snapshot = $conn->prepare($sql);
	//$snapshot->execute([$record]);

	$sql = "SELECT * FROM records";
	$result_sql = $conn->query($sql);
	$data_DB = $result_sql->fetchAll(PDO::FETCH_ASSOC);
	
	echo "<br />";
	foreach($data_DB as $k => $v){
		echo $v['record'];
		echo "<br />";
	}


