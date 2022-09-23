<?php
header('Content-Type: application/json');

$host = 'localhost';
$db_name = 'ktch_db';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
	die('Database connection failed<br>');
}

$blood_group_array_fill = array();
$blood_group_array_dispense = array();
$sql = "
SELECT blood_group, SUM(quantity) AS Total 
FROM blood_bank
WHERE operation='fill' GROUP BY blood_group
";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
	while ($row = $query->fetch_assoc()) {
		$blood_group_array_fill[] = array(
			'blood_group'		=>	$row["blood_group"],
			'total'			=>	$row["Total"]
		);
	}
}
$dispensed_blood = 0;
$sql = "SELECT blood_group, SUM(quantity) AS Total FROM blood_bank WHERE operation='dispense' GROUP BY blood_group";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
	while ($row = $query->fetch_assoc()) {
		$blood_group_array_dispense[] = array(
			'blood_group'		=>	$row["blood_group"],
			'total'			=>	$row["Total"]
		);
	}
}

$data = array();
foreach ($blood_group_array_fill as $row) {
	foreach ($blood_group_array_dispense as $dispense_row) {
		if ($row['blood_group'] == $dispense_row['blood_group']) {
			$data[] = array(
				'blood_group'		=>	$row["blood_group"],
				'total'			=>	$row["total"] - $dispense_row['total'],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
			break;
		}
	}
}
echo json_encode($data);
