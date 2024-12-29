<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Joke</title>
</head>
<body>
    <h1>Edit Joke</h1>
    <form action="<?= BASE_URL ?>jokes/edit" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($joke["id"]) ?>">

        <label for="joke_text">Joke:</label><br>
        <textarea id="joke_text" name="joke_text" required><?= htmlspecialchars($joke["joke_text"]) ?></textarea><br>

        <label for="joke_date">Date:</label><br>
        <input type="text" id="joke_date" name="joke_date" value="<?= htmlspecialchars($joke["joke_date"]) ?>" required><br>

        <button type="submit">Save</button>
    </form>
    <a href="<?= BASE_URL ?>jokes">Cancel</a>
</body>
</html>