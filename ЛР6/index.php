<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo+2">
	<title>LR6</title>
</head>
<body>
	<div class="main">
		<div class="container">
			<form action="bd.php" method="post">
				<select name="num">
					<option value="1">Створити нову БД</option>
					<option value="2">Створити нового користувача</option>
					<option value="3">Створити 3 таблиці</option>
					<option value="4">Заповнити таблиці</option>
					<option value="5">Вивести усі таблиці</option>
					<option value="6">Підключитися до БД</option>
					<option value="7">Вивести БД</option>
				</select>
				<input type="submit" value="GO">
			</form>
		</div>
	</div>
</body>
</html>
