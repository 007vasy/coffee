
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="hu" lang="hu" content="hu">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />
</head>
<body>
<html>
<head>

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
		if($s = $n -> query ("INSERT INTO books (Title, Author, ISBN, Isout) VALUES ('".$_POST["title"]."','".$_POST["author"]."','".$_POST["ISBN"]."','".$_POST["isout"]."')"))
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
		<td width="50px" align="center">Title</td>
		<td width="50px" align="center">Author</td>
		<td width="50px" align="center">ISBN</td>
		<td width="50px" align="center">Isout</td>
		<td width="50px" align="center"> Update </td>
		<td width="50px" align="center"> Delete </td>
	</tr>
	<tr>
		<td width="50px">
		</td>
		<form action="" method="post">
		<td>
		<input value="" type="text" name="title" />
		</td>
		<td>
		<input value="" type="text" name="author" />
		</td>
		<td>
		<input value="" type="text" name="ISBN" />
		</td>
		<td>
		<input value="" type="text" name="isout" />
		</td>
		<td>
		<input type="submit" value="Könyv Hozzáadása" />
		</td>
		</form>
	</tr>
<?php
	
	
	if($s = $n->query("SELECT * FROM books ORDER BY Title ASC"))
	{
			while($row = $s->fetch_assoc())
			{
				echo ('
					<tr>
						<td width="50px" align="center">'.$row["ID"].'</td>
						<td width="50px" align="center">'.$row["Title"].'</td>
						<td width="50px" align="center">'.$row["Author"].'</td>
						<td width="50px" align="center">'.$row["ISBN"].'</td>
						<td width="50px" align="center">'.$row["Isout"].'</td>
						<td width="50px" align="center"> <a href="temp/bupdate.php?azon='.$row["ID"].'"> Update </a></td>
						<td width="50px" align="center"> <a href="temp/bdelete.php?azon='.$row["ID"].'"> Delete </a></td>
					</tr>');
			}
	}
	
?>	
</table>

</body>
</html>
