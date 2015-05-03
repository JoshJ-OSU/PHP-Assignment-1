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
	
	//logout function is based on code from course designer.
	function logout(){
		$_SESSION = array();
		session_destroy();
	}
	
	// Code //
	
	//load the session
	session_start();
	
	//if user calls the logout code, then logout
	if (isset($_GET['action']) && ($_GET['action'] == 'logout')) {
		logout();
		redirectUserToLogin();
	}
	
	
	//check that the username has been loaded, if not redirect back to login
	if ( (isset( $_POST['username']) == false) &&
		 (isset($_SESSION['username']) == false) ) {
		redirectUserToLogin();
	}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Assignment-4 Part-1 content1.php</title>
</head>

<body>
<h3>Page 1</h3>
<?php 
	
	//if the user logged in, record the username.  If invalid, redirect user
	if (isset( $_POST['username'])){
		//check that username is valid
		if (($_POST['username'] == "") || ($_POST['username'] == null)) {
			//Display error message about logging in.
			echo "A username must be entered. <br>"
				 . "Click <a href='login.php'>here</a> to return to the login screen.";
		} else {
			//store username to the session.
			$_SESSION['username'] = $_POST['username'];
		}
	}
	
	//display if user passes error handling (logged in with valid name)
	if (isset($_SESSION['username'])) {
		//initiate count if it has not yet been set, otherwise increment the count
		if (!isset($_SESSION['count'])) {
			$_SESSION['count'] = 0;
		} else {
			$_SESSION['count']++;
		}
		
		echo "<div>" .
			"Hello $_SESSION[username]" . 
			". You have visited this page $_SESSION[count] times before <br>" .
			"Click <a href='?action=logout'>here</a> to log out." .
			"</div>";
			
		echo "<div>" .
			"Click <a href='content2.php'>here</a> to go to page 2." .
			"</div>";
	}
	
?>
</body>
</html>