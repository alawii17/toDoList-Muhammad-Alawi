<?php
session_start();

$key = $_GET['key'];
unset($_SESSION['tasks'][$key]);

$_SESSION['type'] = "success";
$_SESSION['message'] = "Task successfully deleted!";

header("Location: index.php");
exit();
?>