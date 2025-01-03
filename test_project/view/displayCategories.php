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
            background-color: whitesmoke; /* Background color */
            color: #E0B3FF; /* Light purple for text */
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
            width: 425px;  /* Increased width */
            height: 100px; /* Increased height */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }

        .category-box:hover {
            transform: scale(1.08);  /* Slightly larger hover effect */
            background-color: #551A8B;
        }

        .category-name {
            font-size: 26px;  /* Larger font size for category name */
            font-weight: 700;
            margin-bottom: 15px;
        }

        .category-description {
            font-size: 18px;  /* Larger description text */
            font-weight: 400;
            color: #D8BFD8;
        }
    </style>
</head>
<body>
    <h1></h1>
    <?php foreach ($categories as $category): ?>
    <div class="category-box">
        <a href="<?php echo BASE_URL . 'mainPage/' . htmlspecialchars($category['name']) . '/' . htmlspecialchars($category['id']); ?>">
            <?php echo htmlspecialchars($category['name']); ?>
        </a>
    </div>
<?php endforeach; ?>
</body>
</html>

<?php include "static/footer.php"; ?>
