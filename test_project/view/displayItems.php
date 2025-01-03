<h1>Items in <?php echo htmlspecialchars($categoryName); ?></h1>
<?php if (!empty($items)): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <h2><?php echo htmlspecialchars($item['ime']); ?></h2>
                <p><?php echo htmlspecialchars($item['opis']); ?></p>
                <p>Price: <?php echo htmlspecialchars($item['price']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No items found in this category.</p>
<?php endif; ?>
