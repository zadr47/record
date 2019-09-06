<?php
	function create_table_records($db_name){
		require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
		//$sql = "SHOW TABLES LIKE  'records';";
		$sql = "SHOW TABLES FROM '".$db_name."' LIKE 'records';";
		$conn = conn();
		$result_query = $conn->query($sql);
		if($result_query->rowCount()==0){			
		$sql = "CREATE TABLE `record`.`records` ( `id` INT(11) UNSIGNED NOT NULL , `record` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , UNIQUE `id` (`id`)) ENGINE = MyISAM;";
		require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
		$conn->query($sql);
		}
		$conn = NULL;
	}

