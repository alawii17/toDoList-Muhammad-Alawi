<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $priority = $_POST['priority'];

    $newTask = [
        'task' => $task,
        'priority' => $priority
    ];

    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }

    $_SESSION['tasks'][] = $newTask;

    $_SESSION['type'] = "success";
    $_SESSION['message'] = "Tugas Berhasil ditambahkan!";
}

header("Location: index.php");
exit();
?>