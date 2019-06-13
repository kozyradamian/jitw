<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
   <head>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
		<title>New post.</title>
	</head>
	<body>
				<?php include('menu.php');?>
   				<h1>New post:</h1>      
				<form action="wpis.php" method="post" enctype="multipart/form-data">
				    <p>Username: <br /><input type="text" name="userName"/></p>
				    <p>Password: <br /><input type="password" name="userPassword"/></p>
				    <p>Post: <br /><textarea name="postDesc" rows="10" cols="80"/></textarea></p>	
				    <p>Date: <br /><input type="text" name="date" value="<?php echo date('Y\-m\-d') ?>" /></p>
					<p>Time: <br /><input type="text" name="time" value="<?php echo date('H\:i') ?>"/></p>	
	   				<input type="hidden" name="MAX_FILE_SIZE" value="512000" /> 
	   				<input type="file" name="attachment1" /><br/>
		   			<input type="file" name="attachment2" /><br/>
		  			<input type="file" name="attachment3" /><br/>
					<input type="reset" value="Reset" />
    				<input type="submit" value="Sumbit" />
				</form>
			
	</body>
</html>
