<?php
session_start();
if(session_destroy())
{
	Session::flush();
	header("Location: login.php");
}
?>