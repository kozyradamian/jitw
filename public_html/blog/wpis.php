<?php
	include 'menu.php';
	$userName = $_POST['userName'];
	$userPassword = $_POST['userPassword'];
	$postDesc = $_POST['postDesc'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$czyZnalezionoUzytkownika = False;
	$katalog = new RecursiveDirectoryIterator('.');
	// Autentykacja
	$sciezkaDoFolderuBloga = NULL;
	foreach (new RecursiveIteratorIterator($katalog) as $sciezkaDoPliku => $plik) {
		if (! ($plik->isDir())) {
			if ($plik->getFileName() == 'info') {
				$linie = file($sciezkaDoPliku);
				$nazwaUzytkownikaZPliku = $linie[1];
				$nazwaUzytkownikaZPliku = rtrim($nazwaUzytkownikaZPliku, "\r\n");
				$hasloZPliku = $linie[2];
				$hasloZPliku = rtrim($hasloZPliku, "\r\n");
				if ($userName == $nazwaUzytkownikaZPliku) {
					if (md5($userPassword) == $hasloZPliku) {
						$czyZnalezionoUzytkownika = True;
						$sciezkaDoFolderuBloga = $plik->getPath();
						break;
					}
				}
			}
		}
	}
	if (!$czyZnalezionoUzytkownika) {
		echo "Check your login and password! <br/>";
	}
	// Adding post
	if ($czyZnalezionoUzytkownika) {
		$fpl = fopen("semafor.txt","r+");
          	if (flock($fpl, LOCK_EX)){
			$dataBezDywizow = str_replace("-", "", $date);
			$godzinaBezDwukropka = str_replace(":", "", $time);
			$sekundy = date("s");
			$unikalnyId = 0;
			do {
				$id = sprintf("%02d", $unikalnyId);
				$nazwaPliku = $dataBezDywizow . $godzinaBezDwukropka . $sekundy . $id;
				$sciezkaDoPlikuWpisu = "./" . $sciezkaDoFolderuBloga . "/" . $nazwaPliku;
				$unikalnyId = $unikalnyId + 1;
			} while (file_exists($sciezkaDoPlikuWpisu));

			$plik = fopen($sciezkaDoPlikuWpisu, 'w');

			fputs($plik, $postDesc);
			fclose($plik);
		
			$attachment1 = $_FILES['attachment1'];
			$attachment2 = $_FILES['attachment2'];
			$attachment3 = $_FILES['attachment3'];
			$attachments = array($attachment1, $attachment2, $attachment3);
			$attachmentNr = 1;


			foreach($attachments as $attachment) {
				$katalogDocelowy = "./" . $sciezkaDoFolderuBloga . "/";
				$rozszerzenie = pathinfo($attachment['name'], PATHINFO_EXTENSION);
				$plikDocelowy = $katalogDocelowy . $dataBezDywizow . $godzinaBezDwukropka . $sekundy .
				$id . $attachmentNr . "." . $rozszerzenie;
				if (move_uploaded_file($attachment["tmp_name"], $plikDocelowy)) {
					echo "File has been succesfully added." . $attachments['name'] . "<br />";
				}
			
				$attachmentNr= $attachmentNr+ 1;
			}
		

			fclose($fpl);
		        echo "0 errors";
		    	flock($fpl, LOCK_UN);
		    	fclose($plik);
		
		}else echo "Semafor error.";
			
	}
?>
