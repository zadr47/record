<?php
	function create_table_records(){

		try{
			$sql = "SELECT * FROM records;";
			$conn = conn();
			$result_query = $conn->query($sql);	

		}catch(PDOException $e) {  

			$sql = "CREATE TABLE `record`.`records` ( `id` INT(11) UNSIGNED NOT NULL , `record` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , UNIQUE `id` (`id`)) ENGINE = MyISAM;";
			require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
			$conn->query($sql);		  
		}
		$conn = NULL;
	}

