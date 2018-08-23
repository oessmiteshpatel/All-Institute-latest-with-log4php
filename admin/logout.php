<?php
include 'connect.php';
session_start();
unset($_SESSION['user']);
session_destroy();

//header("Location: index.php");
	echo ("<script>
		window.location.href='index.php';
		</script>");
?>
