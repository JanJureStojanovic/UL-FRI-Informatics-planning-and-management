<?php include "static/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Boxes</title>
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General styling */
        body {
            font-family: "Poppins", serif;
            margin: 0;
            padding: 20px;
            background-color: whitesmoke;
            color: #2C0052;
        }

        h1 {
            text-align: center;
            color: #2C0052; /* Dark purple for heading */
        }

        .categories-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px; /* Space between boxes */
            justify-content: center;
        }

        .category-box {
            background: #2C0052;
            border: 1px solid #551A8B;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
            padding: 30px;
            width: 600px;
            height: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none; /* Remove underline */
            color: #E0B3FF; /* Light purple text */
            font-weight: 700;
            transition: transform 0.2s, background-color 0.2s;
        }

        .category-box:hover {
            transform: scale(1.08);  /* Slightly larger hover effect */
            background-color: #551A8B;
        }

        .category-name {
            font-size: 20px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <h1></h1>
    <div class="categories-container">
        <a href="<?= BASE_URL . 'mainPage/Shoes' ?>" class="category-box">
            <div class="category-name">Shoes</div>
        </a>
        <a href="<?= BASE_URL . 'mainPage/Clothes' ?>" class="category-box">
            <div class="category-name">Clothes</div>
        </a>
        <a href="<?= BASE_URL . 'mainPage/Accessories' ?>" class="category-box">
            <div class="category-name">Accessories</div>
        </a>
        <a href="<?= BASE_URL . 'mainPage/Gifts' ?>" class="category-box">
            <div class="category-name">Gifts</div>
        </a>
    </div>
</body>
</html>

<?php include "static/footer.php"; ?>
