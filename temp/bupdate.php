<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="hu" lang="hu" content="hu">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />
</head>
<body>

<a href="../coffeeindexadmin.php?np=books" align="right" >Vissza</a>
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
	
	$title=$_POST["title"];
	$author=$_POST["author"];
	$ISBN=$_POST["ISBN"];
	$isout=$_POST["isout"];
		
	if($b = $n->query('UPDATE books SET Title="'.$title.'", Author="'.$author.'", ISBN="'.$ISBN.'", Isout="'.$isout.'" WHERE ID='.$azon.' '))
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
		if($c = $n->query("SELECT * FROM books WHERE ID='".$azon."'"))
		{
			$r=$c->fetch_assoc();
			
			echo 
			('
				<tr>
					<td>Title:</tr><td><input value="'.$r["Title"].'" type="text" name="title" /></tr>
				
					<td>Author:</tr><td><input value="'.$r["Author"].'" type="text" name="author" /></tr>
					
					<td>ISBN:</tr><td><input value="'.$r["ISBN"].'" type="text" name="ISBN" /></tr>
					
					<td>Isout:</tr><td><input value="'.$r["Isout"].'" type="text" name="isout" /></tr>
				
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