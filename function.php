<?php
	function create_table_records(){
		$sql = "SHOW TABLES LIKE 'records';";
		$conn = conn();
		$result_query = $conn->query($sql);
		if($result_query->rowCount()==0){			
		$sql = "CREATE TABLE `record`.`records` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `record` VARCHAR(255) NOT NULL , UNIQUE `id` (`id`)) ENGINE = MyISAM;";
		require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
		$conn->query($sql);
		}
		$conn = NULL;
	}