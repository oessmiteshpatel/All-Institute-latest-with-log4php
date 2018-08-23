<?php

// function c_query($sql)
// {
//     return mysql_query($sql);
// }

?>

<?php
	session_start();

if(!isset($_SESSION['user']))
	{
		echo ("<script>
		window.location.href='index.php';
		</script>");
	}
?>