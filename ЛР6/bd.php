<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$host = '127.0.0.1';
		$db_name = 'lr6';
		$user = 'root';
		$password = '';
		$n = $_POST['num'];

		$connection = mysqli_connect($host, $user, $password, $db_name);

		if (!$connection)
		{
			die ('Could not connect:'.mysql_error());
		}

		switch ($n)
		{
			case 1:
				mysqli_query($connection, 'CREATE DATABASE lr6');
				echo "БД створена!";
				break;
			
			case 2:
				mysqli_query($connection, 'CREATE USER lr6');
				echo "Користувач створений!";
				break;

			case 3:
				$sql1 = 'CREATE TABLE antivirus(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(30) NOT NULL,
				safe_score INT(100),
				user_score INT(100))';

				$sql2 = 'CREATE TABLE safe_score(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				score INT(100))';

				$sql3 = 'CREATE TABLE user_score(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				score INT(100))';

				mysqli_query($connection, $sql1);
				mysqli_query($connection, $sql2);
				mysqli_query($connection, $sql3);

				echo "Таблиці створені!";
				break;

			case 4:
				$sql1 = 'INSERT INTO antivirus (id, name, safe_score, user_score) 
				VALUES ("1", "avast", "70", "80")' ;
				$sql2 = 'INSERT INTO antivirus (id, name, safe_score, user_score) 
				VALUES ("2", "eset32", "80", "80")';
				$sql3 = 'INSERT INTO antivirus (id, name, safe_score, user_score) 
				VALUES ("3", "malwarebyte", "80", "70")';

				$sql4 = 'INSERT INTO safe_score (id, score) 
				VALUES ("1", "70")';
				$sql5 = 'INSERT INTO safe_score (id, score) 
				VALUES ("2", "80")';
				$sql6 = 'INSERT INTO safe_score (id, score) 
				VALUES ("3", "80")';

				$sql7 = 'INSERT INTO user_score (id, score) 
				VALUES ("1", "80")';
				$sql8 = 'INSERT INTO user_score (id, score) 
				VALUES ("2", "80")';
				$sql9 = 'INSERT INTO user_score (id, score) 
				VALUES ("3", "70")';

				mysqli_query($connection, $sql1);
				mysqli_query($connection, $sql2);
				mysqli_query($connection, $sql3);
				mysqli_query($connection, $sql4);
				mysqli_query($connection, $sql5);
				mysqli_query($connection, $sql6);
				mysqli_query($connection, $sql7);
				mysqli_query($connection, $sql8);
				mysqli_query($connection, $sql9);

				echo "Таблиці заповнено!";
				break;

			case 5:

				echo "antivirus";
				$sql = 'SELECT * FROM `antivirus`';
				$result = mysqli_query($connection, $sql);
				echo "<table border = '1px'>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['safe_score']."</td>";
					echo "<td>".$row['user_score']."</td>";
					echo "</tr>";
				}
				echo "</table>";

				echo "safe_score";
				$sql = 'SELECT * FROM `safe_score`';
				$result = mysqli_query($connection, $sql);
				echo "<table border = '1px'>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['score']."</td>";
					echo "</tr>";
				}
				echo "</table>";

				echo "user_score";
				$sql = 'SELECT * FROM `user_score`';
				$result = mysqli_query($connection, $sql);
				echo "<table border = '1px'>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['score']."</td>";
					echo "</tr>";
				}
				echo "</table>";

				echo "Таблиці виведені!";
				break;

			case 6:
				$connection = mysqli_connect($host, $user, $password, $db_name);

				echo "Підключено до БД";
				break;

			case 7:
				$query = mysqli_query($connection, 'SHOW DATABASES');
				echo "Виведено БД:";
				echo "<table border = '1px'>";
				while ($row = mysqli_fetch_assoc($query))
				{
					echo "<tr>";
					echo "<td>".$row['Database']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				break;

			default:
				echo "Error";
				break;
		}
	}
?>