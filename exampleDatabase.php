<?php

require_once ('database.class.php');

try {
	$db = DB::getInstance();
	
	$sqlExample = 'SELECT * FROM table_name';
	$stm = $db->prepare($sqlExample);

	$stm->execute();

	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $key => $value)
		echo $value['titulo'] . "\n";
} catch (Exception $e) {
	print $e->getMessage();
}

