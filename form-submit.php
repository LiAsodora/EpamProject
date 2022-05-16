<?php 
header("Location: index.php");

$connect = mysqli_connect(null, "root", "SyRZZ9FwtLksM4", "postmark_applications") or die ("Неможливо під´єднатися до сервера");
$connect->query("SET character_set_results=utf8");
mysqli_set_charset($connect, "utf8");

$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];

if (empty($user_email)) {
	mysqli_query($connect, "INSERT INTO application (name, phone) VALUES ('$user_name', '$user_phone')");
}
else {
	mysqli_query($connect, "INSERT INTO application (name, phone, email) VALUES ('$user_name', '$user_phone', '$user_email')");
}
?>