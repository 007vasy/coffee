<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="hu" lang="hu" content="hu">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />
</head>
<body>

<a href="../coffeeindexadmin.php?np=move" align="right" >Vissza</a>
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
	
	$pid=$_POST["pid"];
	$bid=$_POST["bid"];
	$from=$_POST["from"];
	$to=$_POST["to"];
	$iout=$_POST["iout"];
	$elong=$_POST["elong"];
		
	if($b = $n->query('UPDATE mozgas SET PeopleID="'.$pid.'", BookID="'.$bid.'", From_0="'.$from.'", To_0="'.$to.'", I_O="'.$iout.'", Elongation="'.$elong.'" WHERE ID="'.$azon.'" '))
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
		if($c = $n->query("SELECT * FROM mozgas WHERE ID='".$azon."'"))
		{
			$r=$c->fetch_assoc();
			
			echo 
			('
				<tr>
					<td>PeopleID:</tr><td><input value="'.$r["PeopleID"].'" type="text" name="pid" /></tr>
				
					<td>BookID:</tr><td><input value="'.$r["BookID"].'" type="text" name="bid" /></tr>
					
					<td>From:</tr><td><input value="'.$r["From_0"].'" type="text" name="from" /></tr>
					
					<td>To:</tr><td><input value="'.$r["To_0"].'" type="text" name="to" /></tr>
					
					<td>I_O:</tr><td><input value="'.$r["I_O"].'" type="text" name="iout" /></tr>
					
					<td>Elongation:</tr><td><input value="'.$r["Elongation"].'" type="text" name="elong" /></tr>
					
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