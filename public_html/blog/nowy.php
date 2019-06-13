<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
    $blogName = $_POST['blogName'];
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $blogDesc = $_POST['blogDesc'];
    include 'menu.php';
    if (!file_exists($blogName)) {
      mkdir($blogName, 0755, true);
      $filePath_txt = $blogName . "/info";
      $fpl = fopen("semafor.txt","r+");
	if (flock($fpl, LOCK_EX)){
	     	 $plik = fopen($filePath_txt, 'w');
		 fputs($plik, $blogName. "\n");
		 fputs($plik, $userName. "\n");
		 fputs($plik, md5($userPassword) . "\n");
		 fputs($plik, $blogDesc);
		 fclose($plik);
	         echo "Blog has been created. <br />";
		 flock($fpl, LOCK_UN);
      		 fclose($fpl);
	}else echo "Semafor error";	
   }else echo "Destination folder already exist!<br/>";
?>
</body>
</html>
