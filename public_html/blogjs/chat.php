<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript" src="chat.js"></script>	
	<?php	include 'includestyle.php'; ?>
</head>

<body onload="wyswietlListeStyli(); sprawdzCookies()">
	<?php	include 'menu.php'; ?>

<input type="checkbox" name="check" id="check" onchange="update();"/>Uruchom chat<br/>
<textarea rows="20" cols="80" id="chat" style="background: #FFF; color:black" disabled></textarea><br/>
Podaj nick: <input type="text" name="nick" id="nick" /><br/>
Wpisz wiadomość: <br/><input type="text" name="message" id="message" /><br/>
<button type="button" value="Wyślij" onclick="if (checked() && checkValues()) { send(); } else { alert('Uruchom czat a następnie wpisz nick i wiadomość'); }">Wyślij</button>
</body>
</html>
