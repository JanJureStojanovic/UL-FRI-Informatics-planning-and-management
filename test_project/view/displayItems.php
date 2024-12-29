<!-- view/category-items.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category) ?> - Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .items-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .item-box {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .item-box:hover {
            transform: scale(1.05);
        }
        .item-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .item-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
        .item-price {
            font-size: 16px;
            color: #008080;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Items in <?= htmlspecialchars($category) ?> Category</h1>
    <div class="items-container">
        <?php foreach ($items as $item): ?>
            <div class="item-box">
                <div class="item-name"><?= htmlspecialchars($item['name']) ?></div>
                <div class="item-description"><?= htmlspecialchars($item['description']) ?></div>
                <div class="item-price"><?= htmlspecialchars($item['price']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <p><a href="<?= BASE_URL . 'mainPage' ?>">Back to Home</a></p>
</body>
</html>
