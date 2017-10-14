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
	
if($b = $n->query('DELETE FROM people WHERE ID="'.$azon.'" '))
	{
		echo ('<script type="text/javascript">alert(\'Igen sikerult!\')</script>');
	}
	else
		echo ('<script type="text/javascript">alert(\'Nem sikerult\')</script>');
?>
<?php	
	
	
	$n->close();
	
?>

</body>
</html>