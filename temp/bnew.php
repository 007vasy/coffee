<html>
<head>
</head>
<body>
<a href="http://127.0.0.1/my portable files/coffee/coffeeindexadmin.php" align="right" >Vissza</a>
<br />

<?php
	$hozzaad=$_POST["hozzaad"];
	echo $hozzaad;
	$n = new mysqli("localhost","root","","coffee");
	
	if($n->connect_errno)
	{
		echo "gond van!";
		exit();
	}
	
	if(!empty($_POST))
	{
		if($s = $n -> query ("INSERT INTO szokek (Nev, Kor, Mell) VALUES ('".$_POST["x"]."','".$_POST["y"]."','".$_POST["z"]."')"))
		{
			echo ('<script type="text/javascript">alert(\'Igen sikerult!\')</script>');
		}
		else
			echo ('<script type="text/javascript">alert(\'Nem sikerult!\')</script>');
	
	}
?>
</body>
</html>