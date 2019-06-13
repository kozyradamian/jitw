<?php
   $wpisDoSkomentowania = $_POST['wpisDoSkomentowania'];
   $name = $_POST['name'];
   $commDesc = $_POST['commDesc'];
   $commType = $_POST['commType'];
   include 'menu.php';
   // Find file
   $directory = new RecursiveDirectoryIterator('.');
   $katalogBloga = NULL;
   $plikBloga = NULL;
   foreach (new RecursiveIteratorIterator($directory) as $sciezkaDoPliku => $plik) {
      if (! ($plik->isDir())) {
       if (basename($plik) == $wpisDoSkomentowania) {
          $plikBloga = $plik;
          $katalogBloga = dirname($plik);
         }
      }
   }
   // mkdir
   if (!file_exists($plikBloga . ".k")) {
      mkdir($plikBloga . ".k", 0755, true);
   }
   // add comment
   $katalogZKomentarzami = $plikBloga . ".k/";
   // lowest number
   $indeksKomentarza = 0;
   while (file_exists($katalogZKomentarzami . "/" . $indeksKomentarza)) {
      $indeksKomentarza = $indeksKomentarza + 1;
   }
   // create file
   $fpl = fopen("semafor.txt","r+");
   if (flock($fpl, LOCK_EX)){
	   $sciezkaDoPlikuKomentarza = $katalogZKomentarzami . "/" . $indeksKomentarza;
	   $plikKomentarza = fopen($sciezkaDoPlikuKomentarza, "w");
	   fputs($plikKomentarza, $commType. "\n");
	   $znacznikCzasu = date("Y-m-d H:i:s");
	   fputs($plikKomentarza, $znacznikCzasu . "\n");
	   fputs($plikKomentarza, $name . "\n");
	   fputs($plikKomentarza, $commDesc);
	   fclose($plikKomentarza);
	   flock($fpl, LOCK_UN);
	   fclose($fpl);
   }else echo "Semafor error";
   
?>
