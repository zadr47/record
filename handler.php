<?php
	$data = $_REQUEST;
	if($data['do_record'] == ''){
		//остановить выполнение обработчика
		exit();
	}

	$record = $data['record'];

	