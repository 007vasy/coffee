<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="hu" lang="hu" content="hu">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-language" content="hu" />
	<title>Coffee</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="wrapper">
    	<div id="header">header
        </div>
        
        <div id="menu_vertical">vertical menu
			<div id="search_bar">search_bar
			</div>
			
			<div id="category">category
			</div>
        </div>
        
        <div id="menu_horizontal">
			<ul>
				<li><a href="?np=books">Könyvek</a></li>
				<li><a href="?np=people">Felhasználók</a></li>
				<li><a href="?np=move">Mozgás</a></li>
			</ul>
        </div>
        
        <div id="content">
			<?php
			
				if(empty($_GET["np"]))
					$pp="books";
				else
					$pp=$_GET["np"];
				
				include('temp/'.$pp.'.php');
				
			?>
        </div>
        
        <div id="footer">footer
        </div>
    </div>
</body>
</html>