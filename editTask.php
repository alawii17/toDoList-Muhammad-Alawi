<?php
session_start();
$key = $_GET['key'];
$task = $_SESSION['tasks'][$key];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h3>Ubah Tugas</h3>
            </div>
            <div class="card-body">
                <form action="updateTask.php?key=<?= $key; ?>" method="POST">
                    <div class="mb-3">
                        <label for="task" class="form-label">Task</label>
                        <input type="text" class="form-control" id="task" name="task" value="<?= $task['task']; ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Prioritas</label>
                        <select id="priority" name="priority" class="form-select">
                            <option value="Low" <?= $task['priority'] == 'Low' ? 'selected' : ''; ?>>Low</option>
                            <option value="Medium" <?= $task['priority'] == 'Medium' ? 'selected' : ''; ?>>Medium
                            </option>
                            <option value="High" <?= $task['priority'] == 'High' ? 'selected' : ''; ?>>High</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Perbarui Tugas</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>