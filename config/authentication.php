<?php
	session_start();
	if(empty($_SESSION["id"])){
		header("Location: /");
		session_destroy();
	};
?>