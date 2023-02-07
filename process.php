<?php 
	require 'settings.php';
	$name = @$_POST['name'];
	$name = strtoupper($name);
	$btn = $_POST['click'];

	if (isset($btn)) {
		$search = $db->query("SELECT * FROM data WHERE name LIKE '%$name%'")->fetchAll(PDO::FETCH_ASSOC);
	}
 ?>