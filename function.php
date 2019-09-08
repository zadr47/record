<?php
	function create_table_records(){

		try{
			$sql = "SELECT * FROM records;";
			$conn = conn();
			$result_query = $conn->query($sql);	

		}catch(PDOException $e) {  
			
			//$sql = "CREATE TABLE record.records ( id INT(11) NOT NULL , record VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;";
			//$sql = "CREATE TABLE records ( id INT(11) , record VARCHAR(255) );";
			$sql = "CREATE TABLE records ( id INT(11) , record VARCHAR(255) , UNIQUE id (id)) ;";
			$conn->query($sql);		  
		}
		$conn = NULL;
	}

	function damp($value){
		echo "<pre>";
		print_r($value);
		echo "</pre>";
	}

