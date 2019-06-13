<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php	include 'includestyle.php'; ?>
	<title>Form of new post</title>
</head>
<body onload="wyswietlListeStyli(); sprawdzCookies()">
	<?php	include 'menu.php'; ?>

	<form action="koment.php" method="POST" enctype="multipart/form-data">
      <h1>New comment.</h1>

         Select post which you want to comment:
           <select name="wpisDoSkomentowania"><br />
              <?php
					  if (isset($_GET['wybranyKomentarz'])) {
						  $wybranyKomentarz = $_GET['wybranyKomentarz'];
					  } else {
						  $wybranyKomentarz = "";
					  }
	              $katalog = new RecursiveDirectoryIterator('.');
	              foreach (new RecursiveIteratorIterator($katalog) as $sciezkaDoPliku => $plik) {
	                 if (! ($plik->isDir())) {
	                   if (preg_match("/\d{16}$/", $plik)) {
								 echo "test: " . $wybranyKomentarz . "<>" . basename($plik) . "<br />";
								 if (rtrim($wybranyKomentarz) == rtrim($plik)) {
									 echo "<option selected>" . basename($plik) . "</option>";
								 } else {
	                      						echo "<option>" . basename($plik) . "</option>";
							 	 }
	                   }
	                }
	             }
             ?>
          </select><br />

    <p>Type of comment:<br />
    <select name="commType" size="1">	
    <option>Positive</option>
    <option>Negative</option>
    <option>Neutral</option>
    </select>
    </p>
    <p>Your comment: <br /><textarea name="commDesc" rows="10" cols="70"></textarea></p>
    <p>Your name: <br /><input type="text" name="name"></p>
    <input type="reset" value="Reset" />
    <input type="submit" value="Sumbit" />     
  </form>
</body>
</html>
