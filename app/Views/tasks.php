<!DOCTYPE html>
<html>
<head>
    <title>Your Tasks</title>
</head>
<body>
    <h1>Your Tasks</h1>
    <a href="logout.php">Logout</a><br>
    <form method="POST" action="../Controllers/TaskController.php">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description"></textarea><br>
        Status: <select name="status">
            <option value="À faire">À faire</option>
            <option value="En cours">En cours</option>
            <option value="Terminé">Terminé</option>
        </select><br>
        <button type="submit">Create Task</button>
    </form>

    <h2>All Tasks</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?php echo $task->title . ' - ' . $task->status; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
