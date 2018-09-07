<?php
$arg1 = $_POST['user'];
$arg2 = $_POST['pass'];
$password = "foobar";
$username = "admin";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Betazugang freischalten</title>
    <link rel="stylesheet" href="https://unpkg.com/papercss@1.4.1/dist/paper.min.css">
  </head>
  <body>
    <h1>Betakeys</h1>
    <h3>Solltest du ein Beta Key besitzen kannst du ihn hier kopieren um dein Betazugang freizuschalten.</h3>
    <br>
	<?php
	
	if($arg1 != null){
		if($arg2 == $password && $arg1 == $username){
			include('datenbank.php');
			$sql = "SELECT * FROM `keys`";
			echo '<br/>';
			foreach ($mysqli->query($sql) as $row) {
				echo "<h3>" .$row['KEY'] . "<br /> </h3>";
			}
		}else{		
			echo '<h3>Username und Passwort stimme nicht überein!</h3>';
		}	
	}else{
		echo '
		<form method="post" action="list.php">
		<input type="text" name="user" placeholder="Username" required>
		<input type="password" name="pass" placeholder="password" required>
		<input type="submit" value="Login" class="button">
		</form>';
	}


	?>
  </body>
</html>
