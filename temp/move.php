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
		$sql = "INSERT INTO mozgas (PeopleID, BookID, From_0, To_0, I_O, Elongation) VALUES ('".$_POST["pid"]."','".$_POST["bid"]."','".$_POST["from"]."','".$_POST["to"]."','".$_POST["iout"]."','".$_POST["elong"]."')";
		//echo $sql = "INSERT INTO mozgas (PeopleID, BookID, From, To) VALUES ('".$_POST["pid"]."','".$_POST["bid"]."')";
		if($s = $n -> query ($sql))
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
		<td width="50px" align="center">PeopleID</td>
		<td width="50px" align="center">BookID</td>
		<td width="50px" align="center">From</td>
		<td width="50px" align="center">To</td>
		<td width="50px" align="center">I_O</td>
		<td width="50px" align="center">Elongation</td>
		<td width="50px" align="center"> Update </td>
		<td width="50px" align="center"> Delete </td>
		<td width="50px" align="center"> Mtime</td>
	</tr>
	<tr>
		<td width="50px">
		</td>
		<form action="" method="post">
		<td>
		<input value="" type="text" name="pid" />
		</td>
		<td>
		<input value="" type="text" name="bid" />
		</td>
		<td>
		<input value="" type="text" name="from" />
		</td>
		<td>
		<input value="" type="text" name="to" />
		</td>
		<td>
		<input value="" type="text" name="iout" />
		</td>
		<td>
		<input value="" type="text" name="elong" />
		</td>
		<td>
		<input type="submit" value="Mozgás Hozzáadása" />
		</td>
		</form>
	</tr>
<?php
	
	
	if($s = $n->query("SELECT * FROM mozgas ORDER BY ID ASC"))
	{
			while($row = $s->fetch_assoc())
			{
				echo ('
					<tr>
						<td width="50px" align="center">'.$row["ID"].'</td>
						<td width="50px" align="center">'.$row["PeopleID"].'</td>
						<td width="50px" align="center">'.$row["BookID"].'</td>
						<td width="50px" align="center">'.$row["From_0"].'</td>
						<td width="50px" align="center">'.$row["To_0"].'</td>
						<td width="50px" align="center">'.$row["I_O"].'</td>
						<td width="50px" align="center">'.$row["Elongation"].'</td>
						<td width="50px" align="center"> <a href="temp/mupdate.php?azon='.$row["ID"].'"> Update </a></td>
						<td width="50px" align="center"> <a href="temp/mdelete.php?azon='.$row["ID"].'"> Delete </a></td>
						<td width="50px" align="center"> <a href="temp/elongation.php?azon='.$row["ID"].'"> Mtime </a></td>
					</tr>');
			}
	}
	
?>	
</table>

</body>
</html>