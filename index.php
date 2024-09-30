<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h3>To Do List App</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['message']); unset($_SESSION['type']); endif; ?>

                <form action="addTask.php" method="POST" class="mb-4">
                    <div class="mb-3">
                        <label for="task" class="form-label">Tugas</label>
                        <input type="text" class="form-control" id="task" name="task" placeholder="Masukkan tugas"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select id="priority" name="priority" class="form-select">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tambah Tugas</button>
                </form>

                <h4 class="text-center mb-3">Daftar Tugas</h4>
                <?php if(isset($_SESSION['tasks']) && !empty($_SESSION['tasks'])): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tugas</th>
                            <th>Prioritas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_SESSION['tasks'] as $key => $task): ?>
                        <tr>
                            <td><?= $task['task']; ?></td>
                            <td><?= $task['priority']; ?></td>
                            <td>
                                <a href="editTask.php?key=<?= $key; ?>" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="deleteTask.php?key=<?= $key; ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p class="text-center text-muted">Belum ada daftar Tugas.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>