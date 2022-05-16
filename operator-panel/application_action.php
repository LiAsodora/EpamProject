<?php
header("Location: index.php");

$id = $_POST['id'];
if ($_POST['status'] == 'Підтвердити') {
	$status = 'Підтверджено';
}
else if ($_POST['status'] == 'Відмовити') {
	$status = 'Відмовлено';
}

$connect = mysqli_connect(null, "root", "SyRZZ9FwtLksM4", "postmark_applications") or die ("Неможливо під´єднатися до сервера");
$connect->query("SET character_set_results=utf8");
mysqli_set_charset($connect, "utf8");
mysqli_query($connect, "UPDATE application SET status = '$status' WHERE id = '$id'");

?>