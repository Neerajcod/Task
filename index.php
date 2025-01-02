<?php
// Database connection
include "connection.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['desc'];
    if (!empty($title) && !empty($description)) {
        $stmt = $conn->prepare("INSERT INTO tasks (title, description, status) VALUES (?, ?, 'Pending')");
        $stmt->bind_param("ss", $title, $description);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all tasks
$sql = "SELECT * FROM `tasks` ORDER BY `id` DESC";
$result = $conn->query($sql);
$tasks = $result->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Task Manager</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <header></header>
    <main>
        <div class="container my-5">
            <!-- Task Creation Form -->
            <div class="border border-dark rounded p-4 mb-5" style="max-width: 600px; margin: auto;">
                <h1 class="text-center">Create Task</h1>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <input type="text" class="form-control" name="desc" id="desc" placeholder="Enter description" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Task</button>
                </form>
            </div>

            <!-- Task Display Section -->
            <h2 class="text-center border border-dark p-2">View Tasks</h2>
            <?php if (!empty($tasks)): ?>
                <div class="container mt-4">
                    <div class="row g-3">
                        <?php foreach ($tasks as $task): 
                            $status = strtolower($task['status']);
                            $btnClass = match ($status) {
                                'pending' => 'btn-secondary',
                                'in progress' => 'btn-warning',
                                'completed' => 'btn-success',
                                default => 'btn-secondary',
                            };
                        ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($task['title']) ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($task['description']) ?></p>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="btn <?= $btnClass ?>"><?= htmlspecialchars($task['status']) ?></span>
                                            <span class="border border-dark rounded p-1"><?= htmlspecialchars($task['created_at']) ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="edit.php?id=<?= $task['id'] ?>" class="btn btn-primary">Edit</a>
                                            <a href="delete.php?id=<?= $task['id'] ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this task?');">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center mt-4">No tasks available. Create one above!</p>
            <?php endif; ?>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
