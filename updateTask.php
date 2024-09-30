<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_GET['key'];
    $task = $_POST['task'];
    $priority = $_POST['priority'];

    $_SESSION['tasks'][$key] = [
        'task' => $task,
        'priority' => $priority
    ];

    $_SESSION['type'] = "success";
    $_SESSION['message'] = "Task successfully updated!";
}

header("Location: index.php");
exit();
?>