<?php
session_start();
session_destroy();
header("Location: successfull_logout.html");
?>
