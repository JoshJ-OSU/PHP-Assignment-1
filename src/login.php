<?php
	// from lecture PHP sessions by course designer.  Code redirects user
	// independent of host server by piecing together a url back to login.php
	function redirectUserToContent(){
		$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
		$filePath = implode('/', $filePath);
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
		header("Location: " . $redirect . "/content1.php", true);
		die();
	}
	
	session_start();
	
	//check that the username has not been loaded, if so redirect back to content1
	if (isset($_SESSION['username']) == true) {
		redirectUserToContent();
	}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Assignment-4 Part-1 login.php</title>
</head>

<body>

<h3>Login.php</h3>
<form action="content1.php" method="POST">
<label>User Name:</label>
<input type="text" name="username">
<input type="submit" value="Login">
</form>


</body>
</html>