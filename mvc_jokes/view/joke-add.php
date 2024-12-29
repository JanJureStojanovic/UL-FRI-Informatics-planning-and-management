<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Joke</title>
</head>
<body>
    <h1>Add New Joke</h1>
    <form action="<?= BASE_URL . "jokes/add" ?>" method="POST">
        <label for="joke_text">Joke Text:</label><br>
        <textarea name="joke_text" id="joke_text" required></textarea><br>

        <label for="joke_date">Date:</label><br>
        <input type="text" name="joke_date" id="joke_date" value="<?= date('Y-m-d') ?>" required><br>

        <button type="submit">Add Joke</button>
    </form>

    <p><a href="<?= BASE_URL . "jokes" ?>">Back to joke list</a></p>
</body>
</html>