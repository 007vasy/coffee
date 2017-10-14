<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="hu" lang="hu" content="hu">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />
</head>
<body>

<a href="../coffeeindexadmin.php?np=people" align="right" >Vissza</a>
<br />
<?php
$azon=$_GET["azon"];

$n = new mysqli("localhost","root","","coffee");
	
	if($n->connect_errno)
	{
		echo "gond van!";
		exit();
	}
	
if(!empty($_POST))
{
	$n = new mysqli("localhost","root","","coffee");
	
	if($n->connect_errno)
	{
		echo "gond van!";
		exit();
	}
	
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$idnumber=$_POST["idnumber"];
	$penalty=$_POST["penalty"];
		
	if($b = $n->query('UPDATE people SET First_name="'.$fname.'", Last_name="'.$lname.'", Email="'.$email.'", Phone="'.$phone.'", ID_number="'.$idnumber.'", Penalty="'.$penalty.'" WHERE ID="'.$azon.'" '))
	{
		echo ('<script type="text/javascript">alert(\'Igen sikerult!\')</script>');
	}
	else
		echo ('<script type="text/javascript">alert(\'Nem sikerult\')</script>');
	
}	
?>	

	<form action="" method="post" >
		<table align="center" border="0px">
		<?php
		if($c = $n->query("SELECT * FROM people WHERE ID='".$azon."'"))
		{
			$r=$c->fetch_assoc();
			
			echo 
			('
				<tr>
					<td>First_name:</tr><td><input value="'.$r["First_name"].'" type="text" name="fname" /></tr>
				
					<td>Last_name:</tr><td><input value="'.$r["Last_name"].'" type="text" name="lname" /></tr>
					
					<td>Email:</tr><td><input value="'.$r["Email"].'" type="text" name="email" /></tr>
					
					<td>Phone:</tr><td><input value="'.$r["Phone"].'" type="text" name="phone" /></tr>
					
					<td>ID_number:</tr><td><input value="'.$r["ID_number"].'" type="text" name="idnumber" /></tr>
					
					<td>Penalty:</tr><td><input value="'.$r["Penalty"].'" type="text" name="penalty" /></tr>
					
					<td colspan="2"><input type="submit" value="Feltolt" /></tr>
				</tr>
			');
			

		
		}
		?>
		</table>	
	</form>

<?php	
	
	
	$n->close();
	
?>


</body>
</html>