<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title>PHP Form Demo 1</title>
	<style>
		table, th, td {
    	border: 1px solid black;

		}
	</style>
</head>
<body>	
	<h1 style="text-align:center;"><b>$_SERVER im Überblick</b></h1>
	<table align="center">
  <tr>
    <th>Variable</th>
    <th>Wert</th>     
  </tr>
  <tr>
    <td>Skript-Pfad</td>
    <td><?php echo $_SERVER["SCRIPT_NAME"] ?></td>     
  </tr>
  <tr>
    <td>Server-Name/IP</td>
    <td><?php echo $_SERVER["SERVER_NAME"]."/"; echo $_SERVER["SERVER_ADDR"]   ?></td>     
  </tr>
  <tr>
    <td>Protokoll</td>
    <td><?php echo $_SERVER["SERVER_PROTOCOL"] ?></td>     
  </tr>
  <tr>
    <td>Client-IP</td>
    <td><?php echo $_SERVER["REMOTE_ADDR"] ?></td>     
  </tr>
  <tr>
    <td>URI</td>
    <td><?php echo $_SERVER["REQUEST_URI"] ?></td>     
  </tr>
  <tr>
    <td>Server-Info</td>
    <td><?php echo $_SERVER["SERVER_SIGNATURE"] ?></td>     
  </tr>
</table>	
</body>
</html>