<?php
session_start();

require_once __DIR__ . '/../models/connection.php';

?>

<section class="px-8 py-12">
    <h2 class="text-3xl font-bold mb-8 text-gray-800">Recommended for you</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Product Card 1 -->
        <?php foreach ($products as $product) { ?>
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <img src="<?php echo $product['img_url']; ?>" alt="Grey Athletic Shoe" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4 flex flex-col flex-grow justify-between">
                    <h3 class="text-lg font-semibold"><?php echo $product['product_name']; ?></h3>
                    <p class="text-green-600 font-bold my-2"><?php echo $product['product_price']; ?></p>
                    <a href="/soleXchange/src/controllers/product.php?product=<?php echo urlencode($product['product_name']); ?>" class="mt-auto flex-grow flex items-center justify-center">
                        <button class="w-full bg-green-500 text-white py-2 mt-2 rounded hover:bg-green-600 transition-colors duration-300">
                            Buy Now
                        </button>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>