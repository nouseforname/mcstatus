<html>
<head>
<meta></meta><title>Minecraft server info</title>
<link rel="icon" type="image/ico" href="http://sm-wp.tk/mc.ico"/>
<style>
@font-face { font-family: Minecraft; src: url('http://sm-wp.tk/minecraft.ttf'); } 
body {
font-family: Minecraft
}
</style>
</head>
</head>
<body background="http://sm-wp.tk/bg.png" align="center">
<?php
	
	include_once 'status.class.php';
	$status = new MinecraftServerStatus();
	header('Content-type: text/html; charset=utf-8');
	echo"<form method='POST'>
	<br><br><br><br><br>
	<table align='center' style='width:500px'>
	<tr align='center'>
	<td colspan='2'>
	<font color='#FFFFFF'>
	Server IP:
	<input type='text' name='server' />
	<input type='submit' name='submit' value='Search!' /></font>
	</td>
	</tr>
	</form>";
	if (isset($_POST['submit']))
		$status = new MinecraftServerStatus();
		$response = $status->getStatus($_POST['server']);
		if(!$response) {
			echo"
			<tr align='center'>
			<td>
			<font color='#FFFFFF'>Not server typed above or server is offline</font>
			</td>
			</tr>
			";
			} else {
			echo"<tr align='center'><td><font color='FFFFFF'>Icon:</font>
			</td>
			<td>
			<img width=\"64\" height=\"64\" src=\"".$response['favicon']."\" /><br><br>
			</td>
			</td>
			<tr align='center'>
			<td>
			<font color='#FFFFFF'>IP:</font>
			</td>
			<td>
			<font color='#CECECE'>".$response['hostname']."
			</td>
			</tr><br><br>
			<tr align='center'>
			<td>
			<font color='#FFFFFF'>Version:</font>
			</td>
			<td>
			<font color='#CECECE'>".$response['version']."
			</td>
			</tr><br><br>
			<tr align='center'>
			<td>
			<font color='#FFFFFF'>Players:</font>
			</td>
			<td>
			<font color='#CECECE'>".$response['players']."/".$response['maxplayers']."</font>
			</td>
			</tr><br><br>
			<tr align='center'>
			<td>
			<font color='#FFFFFF'>Motd:</font>
			</td>
			<td nowrap='true'>".$response['motd']."
			</td>
			</tr><br><br>
			<tr align='center'>
			<td>
			<font color='#FFFFFF'>Ping:</font>
			</td>
			<td>
			<font color='#CECECE'>".$response['ping']."</font> <font color='#FFFFFF'>ms
			</td>
			</tr>";
		}
?>
</body>
</html>