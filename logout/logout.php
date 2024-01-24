<?php

    session_start();
	session_destroy();
	$path = 'location:../login.php?error=Signout successfully.';
	// $path = 'location:../login.php';
	header($path);
	exit();