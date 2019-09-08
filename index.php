<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/function.php');


	create_table_records();


	$data = $_REQUEST;

	if(isset($data['do_delete'])){
		$sql ="DELETE FROM records WHERE id = ".$data['do_delete'].";";
		$conn = conn();
		$conn->query($sql);
		$conn = NULL;
	}
	if(isset($data['do_record'])){
		//проверяем можно ли записывать
		if(empty($data['record'])){
			//попросить заполнить
			$sql = "SELECT * FROM records ORDER BY id DESC";
			$conn = conn();
			$result_sql = $conn->query($sql);
			$arrMessage = $result_sql->fetchAll(PDO::FETCH_ASSOC);
			$conn = NULL;

			$message = 'Вы ничего не ввели';
			require_once($_SERVER['DOCUMENT_ROOT'].'/main.php');
		}else{
			//нужно занести в бд


			$sql = "SELECT id FROM records;";
			$conn = conn();
			$result_query = $conn->query($sql);
			$arrId = $result_query->fetchAll(PDO::FETCH_ASSOC);

			$max_id = 0;
			foreach ($arrId as $K => $v) {
				foreach ($v as $var) {
					if($var > $max_id){
						$max_id = $var;
					}
				}
			}
			$id = $max_id;
			$id++;

			$sql = "INSERT INTO records (id,record) VALUES (?,?);";
			$snapshot = $conn->prepare($sql);
			$snapshot->execute([$id,$data['record']]);

			$sql = "SELECT * FROM records ORDER BY id DESC";
			$conn = conn();
			$result_sql = $conn->query($sql);
			$arrMessage = $result_sql->fetchAll(PDO::FETCH_ASSOC);
			$conn = NULL;

			require_once($_SERVER['DOCUMENT_ROOT'].'/main.php');
		}

	}else{
		$sql = "SELECT * FROM records ORDER BY id DESC";
		$conn = conn();
		$result_sql = $conn->query($sql);
		$arrMessage = $result_sql->fetchAll(PDO::FETCH_ASSOC);
		
		$conn = NULL;

		require_once($_SERVER['DOCUMENT_ROOT'].'/main.php');
	}
?>