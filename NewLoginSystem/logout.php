<?php
	// start session
   session_start();
    // unset the session
   session_unset();
   // destroy the session , if successfull ,, redirect to login.php file
   if(session_destroy()) {
   		// redirecting
      header("Location: login.php");
   }
   exit();
?>