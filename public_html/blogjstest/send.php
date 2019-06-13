<?php
$filename = "messages.txt";
$file = fopen($filename, "a");
$count = count(file($filename));
$text = $_GET["nick"].": ".$_GET["message"]."\n";
fwrite($file, $text);
fclose($file);

while ($count > 1000) { // max 1000 wiadomosci w pliku
	$file = file($filename);
	unset($file[0]);
	file_put_contents($filename, $file);
	$count--;
}
?>
