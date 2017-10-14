<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="hu" lang="hu" content="hu">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />

</head>
<body>
<?php
	
	$n = new mysqli("localhost","root","","coffee");
	
	if($n->connect_errno)
	{
		echo "gond van!";
		exit();
	}
	//$n-> query ("SET NAMES UTF8");
	
	if(!empty($_POST))
	{
	$n = new mysqli("localhost","root","","coffee");
	
	if($n->connect_errno)
	{
		echo "gond van!";
		exit();
	}
	
			
	if(!empty($_POST))
	{
		if($s = $n -> query ("INSERT INTO people (First_name, Last_name, Email, Phone, ID_number, Penalty) VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["idnumber"]."','".$_POST["penalty"]."')"))
		{
			echo ('<script type="text/javascript">alert(\'Igen sikerult!\')</script>');
		}
		else
			echo ('<script type="text/javascript">alert(\'Nem sikerult!\')</script>');
	
	}
	
	}	
?>
<table align="center" border="0px">
	<tr>
		<td width="50px" align="center">ID</td>
		<td width="50px" align="center">First_name</td>
		<td width="50px" align="center">Last_name</td>
		<td width="50px" align="center">Email</td>
		<td width="50px" align="center">Phone</td>
		<td width="50px" align="center">ID_number</td>
		<td width="50px" align="center">Penalty</td>
		<td width="50px" align="center"> Update </td>
		<td width="50px" align="center"> Delete </td>
	</tr>
	<tr>
		<td width="50px">
		</td>
		<form action="" method="post">
		<td>
		<input value="" type="text" name="fname" />
		</td>
		<td>
		<input value="" type="text" name="lname" />
		</td>
		<td>
		<input value="" type="text" name="email" />
		</td>
		<td>
		<input value="" type="text" name="phone" />
		</td>
		<td>
		<input value="" type="text" name="idnumber" />
		</td>
		<td>
		<input value="" type="text" name="penalty" />
		</td>
		<td>
		<input type="submit" value="Felh. Hozzáadása" />
		</td>
		</form>
	</tr>
<?php
	
	
	if($s = $n->query("SELECT * FROM people ORDER BY First_name ASC"))
	{
			while($row = $s->fetch_assoc())
			{
				echo ('
					<tr>
						<td width="50px" align="center">'.$row["ID"].'</td>
						<td width="50px" align="center">'.$row["First_name"].'</td>
						<td width="50px" align="center">'.$row["Last_name"].'</td>
						<td width="50px" align="center">'.$row["Email"].'</td>
						<td width="50px" align="center">'.$row["Phone"].'</td>
						<td width="50px" align="center">'.$row["ID_number"].'</td>
						<td width="50px" align="center">'.$row["Penalty"].'</td>
						<td width="50px" align="center"> <a href="temp/pupdate.php?azon='.$row["ID"].'"> Update </a></td>
						<td width="50px" align="center"> <a href="temp/pdelete.php?azon='.$row["ID"].'"> Delete </a></td>
					</tr>');
			}
	}
	
?>	
</table>

</body>
</html>