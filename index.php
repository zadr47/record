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
			$sql = "SELECT MAX(id) FROM records;";
			$conn = conn();
			$result_query = $conn->query($sql);
			$max_id = $result_query->fetch(PDO::FETCH_ASSOC);
			$id = $max_id['MAX(id)'];
			$id = $id + 0;
			echo gettype($id);
			echo $id;
			echo "<br />";
			$id++;
			echo $id;

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