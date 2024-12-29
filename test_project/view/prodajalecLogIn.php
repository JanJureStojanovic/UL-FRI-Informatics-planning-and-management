<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prodajalec Login</title>
</head>
<body>
    <h1>Prodajalec Login</h1>
    <form action="<?= BASE_URL . 'mainPage/prodjalecLogIn' ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <br><br>
    <!-- Back to home button -->
    <a href="<?= BASE_URL . 'mainPage' ?>">
        <button>Back to Home</button>
    </a>
</body>
</html>
