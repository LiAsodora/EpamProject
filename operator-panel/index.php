<!DOCTYPE html>
<html>
	<head>
		<title>Панель оператора</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;500;700&family=Open+Sans:ital,wght@0,600;0,700;0,800;1,600;1,700;1,800&display=swap" rel="stylesheet"> 
		<link rel="shortcut icon" href="#" />
    <script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
    <div class="requests-body">
  		<div class = "table">
  			<h1>Поточна заявка</h1>
            <table>
                <tr>
                  <th>Номер заявки</th>
                  <th>Ім´я</th>
                  <th>Телефон</th>
                  <th>Електронна скринька</th>
                </tr>
                <?php

                $connect = mysqli_connect(null, "root", "SyRZZ9FwtLksM4", "postmark_applications") or die ("Неможливо під´єднатися до сервера");
                $connect->query("SET character_set_results=utf8");
                mysqli_set_charset($connect, "utf8");
                $rows = mysqli_query($connect, "SELECT id, name, phone, email FROM application WHERE status = 'Нова' ORDER BY id DESC LIMIT 1");
                $application = mysqli_fetch_array($rows);
                if (empty($application)) {
                  echo '<script>alert("Наразі немає нових заявок")</script>';
                  echo "<script>window.location = '../index.php'</script>";
                }
                $id = $application['id'];
                mysqli_query($connect, "UPDATE application SET status = 'Розглядання' WHERE id = '$id'");

                echo '<tr>';
                  echo '<td>' . $application['id'] . '</td>';
                  echo '<td>' . $application['name'] . '</td>';
                  echo '<td>' . $application['phone'] . '</td>';
                  echo '<td>' . $application['email'] . '</td>';
                echo '</tr>';

                ?>
            </table>
            <form action="application_action.php" method="post">
              <input class="hidden" type="" name="id" value="<?php echo $id; ?>">
              <div class="buttons">
                <input class="approve-button" type="submit" name="status" value="Підтвердити"></input>
                <input class="reject-button" type="submit" name="status" value="Відмовити"></input>
              </div>
            </form>
               <div class="buttons">
              <button onclick="openHomePage()" class="back-button">Головна сторінка</button>
            </div>
  		</div>
    </div>
		<div class="footer">
			<p>&#169; 2022 Всі права захищені. Биваліна Наталія спеціально для EPAM Systems</p>
		</div>
	</body>
</html>