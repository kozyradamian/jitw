<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php	include 'includestyle.php'; ?>
</head>
<body onload="wyswietlListeStyli(); sprawdzCookies()">
   <?php
	include 'menu.php';
		$blogName = "";
		if (isset($_GET['name'])) {
			$blogName = $_GET['name'];
		}
      if ($blogName == "") {
         // Show every blog
			$directory = new DirectoryIterator(".");
         foreach ($directory as $fileInfo) {
             if ($fileInfo->isDir() && !$fileInfo->isDot()) {
                $blog = $fileInfo->getFilename();
                echo sprintf("<a href=\"blog.php?name=%s\">%s</a><br />", $blog, $blog);
             }
         }
      } else {
         // find blog
			$flag = false;
			$directory = "./" . $blogName . "/";
			if (file_exists($directory)) {
				$flag = true;
				// Show info about blog
				$plikOpisBloga = fopen($directory . "/info", 'r');
				$lineNumber = 1;
				while (($line = fgets($plikOpisBloga)) !== false) {
					if ($lineNumber == 1) {
						echo "<h1>Title: </strong>" . $line . "</h1>";
					} else if ($lineNumber == 4) {
						echo "<h3>Description: </strong>" . $line . "</h3>";
					}
					if ($lineNumber >= 5) {
						echo $line . "<br />";
					}
					$lineNumber = $lineNumber + 1;
				}
				fclose($plikOpisBloga);

				// Show posts and comments
				$wzorzecNazwyPliku = '/\\d{16}$/';
				$iterator = new DirectoryIterator($directory);
				foreach ($iterator as $aktualnyPlik) {
					if (!$aktualnyPlik->isDir() && preg_match($wzorzecNazwyPliku, $aktualnyPlik)){
						$zawartosc = file_get_contents($iterator->getPathName());
						echo "<h2>Post: " . $aktualnyPlik . "</h2>";
						echo $zawartosc . "<br /></br >";
						// Show attachments
						$wzorzecZalacznika = '/' . $aktualnyPlik . '[1-3]/';
						foreach (new DirectoryIterator($directory) as $plik) {
							if (preg_match($wzorzecZalacznika, $plik)) {
								$sciezkaDoZalacznika = $directory;
						    	echo sprintf('Attachment: <a href="./%s/%s">%s</a><br />', $blogName, $plik, $plik);
						 	}
						}
						echo "<br />";
						// Show comments
						if (file_exists($directory . $aktualnyPlik . ".k")) {
							foreach (new DirectoryIterator($directory . $aktualnyPlik . ".k") as $plk) {
								if(!$plk->isDot() && !$plk->isDir()){
									$plikKomentarza = fopen($plk->getPathName(), 'r');
									$lineNumber = 1;
									while (($line = fgets($plikKomentarza)) !== false) {
										if ($lineNumber == 1) {
											echo "<strong>Type of comment: </strong>" . $line . "<br />";
										} else if ($lineNumber == 2) {
											echo "<strong>Date of comment: </strong>" . $line . "<br />";
										} else if ($lineNumber == 3) {
											echo "<strong>Author of comment: </strong>" . $line .  "<br />";
										} else if ($lineNumber >= 4) {
											echo $line . "<br />";
										}
										$lineNumber = $lineNumber + 1;
									}
									fclose($plikKomentarza);
									echo "<br />";
								}
							}
						}
					}
				}
      }
		if (!$flag) {
			echo "Blog not found. <br />";
		}
	}
   ?>
</body>
</html>
