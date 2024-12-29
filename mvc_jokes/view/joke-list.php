<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Joke List</title>
</head>
<body>
    <h1>List of Jokes</h1>
    <ul>
        <?php foreach ($jokes as $joke): ?>
            <li>
                <?= htmlspecialchars($joke["joke_text"]) ?> (<?= htmlspecialchars($joke["joke_date"]) ?>)
                <a href="<?= BASE_URL ?>jokes/edit?id=<?= $joke["id"] ?>">Edit</a>
                <!-- Delete form -->
                <form action="<?= BASE_URL ?>jokes/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $joke["id"] ?>">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this joke?');">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="<?= BASE_URL ?>jokes/add">Add New Joke</a>
</body>
</html>