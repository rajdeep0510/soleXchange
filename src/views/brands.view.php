<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Grid</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <?php require __DIR__ . '/../helpers/navbar.php'; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-10">
        <?php foreach ($products as $product): ?>            
                <a href="<?php echo htmlspecialchars($product['link']); ?>" 
               class="block transition-all duration-300 hover:scale-105">
                <div class="bg-gray-200 text-gray-900 
                            flex items-center justify-center p-6 h-40 rounded-lg
                            hover:bg-gray-600 hover:text-white
                            transition-colors duration-300 cursor-pointer">
                    <span class="text-xl font-bold">
                        <?php echo htmlspecialchars($product['name']); ?>
                    </span>
                </div>
            </a>
        <?php endforeach; ?>    
    </div>
</body>
</html>
