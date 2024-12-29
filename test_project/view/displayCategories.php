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
            background: #2C0052; /* Box background color */
            border: 1px solid #551A8B; /* Border color */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px; /* Box width */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }

        .category-box:hover {
            transform: scale(1.05); /* Hover effect */
            background-color: #551A8B; /* Darken background on hover */
        }

        .category-name {
            font-size: 20px;
            font-weight: 700; /* Bold category name */
            margin-bottom: 10px;
            color: #E0B3FF; /* Category name color */
        }

        .category-description {
            font-size: 16px;
            font-weight: 400; /* Normal weight description */
            color: #D8BFD8; /* Softer light purple for description */
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1></h1>
    <div class="categories-container">
        <?php
        // Example categories (this would be replaced with database fetch later)
        $categories = [
            ["name" => "Electronics", "description" => "Latest gadgets and devices", "id" => 1],
            ["name" => "Furniture", "description" => "Stylish and comfortable furniture", "id" => 2],
            ["name" => "Clothing", "description" => "Trendy apparel for all seasons", "id" => 3],
            ["name" => "Toys", "description" => "Fun toys for children of all ages", "id" => 4],
            ["name" => "Sports", "description" => "Equipment and gear for outdoor activities", "id" => 5],
            ["name" => "Books", "description" => "A wide range of reading material", "id" => 6]
        ];

        // Loop through categories and display them
        foreach ($categories as $category) {
            echo "
                <div class='category-box' onclick='window.location.href=\"" . BASE_URL . "mainPage/" . urlencode($category['name']) . "\"'>
                    <div class='category-name'>" . htmlspecialchars($category['name']) . "</div>
                    <div class='category-description'>" . htmlspecialchars($category['description']) . "</div>
                </div>
            ";
        }      
        ?>
    </div>
</body>
</html>

<?php include "static/footer.php"; ?>
