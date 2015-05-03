<?php
	
	// Functions //

	// from lecture PHP sessions by course designer.  Code redirects user
	// independent of host server by piecing together a url back to login.php
	function redirectUserToLogin(){
		$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
		$filePath = implode('/', $filePath);
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
		header("Location: " . $redirect . "/login.php", true);
		die();
	}
	
	// Code //
	
	//load the session
	session_start();
	
	
	//check that the username has been loaded, if not redirect back to login
	if (isset($_SESSION['username']) == false) {
		redirectUserToLogin();
	}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Assignment-4 Part-1 login.php</title>
</head>

<body>
<h3>Page 2</h3>
<?php
	if (isset($_SESSION['username']) == true) {
		echo "Click <a href='content1.php'>here</a> to go back to page 1.";
	}
?>
</body>
</html>
