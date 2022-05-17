<!DOCTYPE html>
<html>
	<head>
		<title>Черга</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;500;700&family=Open+Sans:ital,wght@0,600;0,700;0,800;1,600;1,700;1,800&display=swap" rel="stylesheet"> 
		<link rel="shortcut icon" href="#" />
	</head>
	<body>
		<div class="form-background">
			<div class="form">
				<h1>Стань у чергу на отримання<br>лімітованої марки</h1>
				<hr>
				<form action="form-submit.php" method="POST">
					<div class="form-input-block">
						<input class="form-single-input" type="text" name="user_name" placeholder="Ім´я" required>
						<input class="form-single-input" type="text" name="user_phone" placeholder="Мобільний телефон" required>
						<input class="form-single-input" type="text" name="user_email" placeholder="Електронна пошта">
					</div>
					<input id="disabled" class="form-button" type="submit" value="Відправити">
				</form>
			</div>
		</div>
		<div class = "requests-body">
			<h1>Список нових заявок</h1>
			<table>
				<tr>
                	<th>Номер</th>
                	<th>Ім´я користувача</th>
                	<th>Статус</th>
              	</tr>

			<?php

			$connect = mysqli_connect(null, "root", "SyRZZ9FwtLksM4", "postmark_applications") or die ("Неможливо під´єднатися до сервера");
			$connect->query("SET character_set_results=utf8");
			mysqli_set_charset($connect, "utf8");

			$rows = mysqli_query($connect, "SELECT id, name, phone, email, status FROM application ORDER BY id DESC");
			while ($stroka = mysqli_fetch_array($rows))
			{
			 	echo '<tr>';
                	echo '<td>' . $stroka['id'] . '</td>';
                	echo '<td>' . $stroka['name'] . '</td>';
                	echo '<td>' . $stroka['status'] . '</td>';
              	echo '</tr>';
			}
			?>

            </table>
		</div>
		<div class="footer">
			<p>&#169; 2022 Всі права захищені. Биваліна Наталія, Пилипенко Кароліна та Пітіченко Антоніна спеціально для EPAM Systems</p>
		</div>
	</body>
</html>
