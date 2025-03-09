<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($brand); ?> Products - SoleXchange</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <?php require __DIR__ . '/../helpers/navbar.php'; ?>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-800"><?php echo htmlspecialchars($brand); ?> Products</h1>

        <?php if (empty($brand_products)): ?>
            <div class="text-center py-8">
                <p class="text-xl text-gray-600">No products available for this brand.</p>
            </div>
        <?php else: ?>
        <!-- Recommended Products Section -->
        <section class="px-8 py-12">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Recommended for you</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Product Card 1 -->
                <?php foreach ($brand_products as $product) { ?>
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                    <img src="<?php echo $product['img_url']; ?>" alt="Grey Athletic Shoe" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4 flex flex-col flex-grow justify-between">
                        <h3 class="text-lg font-semibold"><?php echo $product['product_name']; ?></h3>
                        <p class="text-green-600 font-bold my-2"><?php echo $product['product_price']; ?></p>
                        <div class="mt-auto flex-grow flex items-center justify-center">
                            <button class="w-full bg-green-500 text-white py-2 mt-2 rounded hover:bg-green-600 transition-colors duration-300">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
</body>
</html> 