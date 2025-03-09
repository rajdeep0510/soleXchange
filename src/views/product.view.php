<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['product_name']); ?> - SoleXchange</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php 
    session_start();
    require __DIR__ . '/../helpers/navbar.php'; 
    ?>

    <!-- Container -->
    <div class="max-w-6xl mx-auto px-6 py-10">
        <!-- Breadcrumbs -->
        <nav class="text-gray-500 text-sm mb-6">
            <a href="/soleXchange" class="hover:underline">Home</a> &gt;
            <a href="/soleXchange/brands.php" class="hover:underline"><?php echo htmlspecialchars($product['brand_name']); ?></a> &gt;
            <span class="text-black"><?php echo htmlspecialchars($product['product_name']); ?></span>
        </nav>

        <!-- Product Grid -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Images -->
            <div class="grid grid-cols-2 gap-4">
                <img src="<?php echo htmlspecialchars($product['img_url'] ?? '/assets/images/placeholder.jpg'); ?>"
                    class="rounded-lg shadow-md col-span-2"
                    alt="<?php echo htmlspecialchars($product['product_name']); ?>">
            </div>

            <!-- Product Details -->
            <?php
            // Debug output
            error_log("Product Data in View: " . print_r($product, true));
            ?>
            <form action="/soleXchange/billing/" method="POST">
                <?php if (isset($_SESSION['errors'])): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <?php foreach ($_SESSION['errors'] as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['errors']); ?>
                    </div>
                <?php endif; ?>

                <!-- Hidden inputs for product information -->
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>">
                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($product['product_price']); ?>">
                <input type="hidden" name="brand_name" value="<?php echo htmlspecialchars($product['brand_name']); ?>">
                <input type="hidden" name="img_url" value="<?php echo htmlspecialchars($product['img_url']); ?>">

                <div>
                    <h2 class="text-gray-600 uppercase text-sm"><?php echo htmlspecialchars($product['brand_name']); ?></h2>
                    <h1 class="text-3xl font-bold"><?php echo htmlspecialchars($product['product_name']); ?></h1>
                    <p class="text-2xl font-semibold mt-2">$<?php echo htmlspecialchars($product['product_price']); ?></p>

                    <?php if (isset($product['product_description']) && $product['product_description']): ?>
                        <p class="text-gray-600 mt-4"><?php echo htmlspecialchars($product['product_description']); ?></p>
                    <?php endif; ?>

                    <!-- Shoe Sizes -->
                    <div class="mt-6">
                        <p class="text-sm font-semibold">Select Size (UK) <a href="#" class="text-blue-500 underline">Size Chart</a></p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <?php $sizes = range(6, 12); ?>
                            <?php foreach ($sizes as $size): ?>
                                <label class="relative">
                                    <input type="radio" name="size" value="<?php echo $size; ?>" class="hidden peer" required>
                                    <span class="border px-4 py-2 rounded-lg cursor-pointer transition-colors inline-block
                             peer-checked:bg-black peer-checked:text-white peer-checked:border-black
                             hover:bg-gray-200 hover:border-gray-500 border-gray-300 text-gray-700">
                                        <?php echo $size; ?>
                                    </span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <!-- Quantity Selection -->
                    <div class="mt-6">
                        <label for="quantity" class="text-sm font-semibold">Quantity</label>
                        <select name="quantity" id="quantity" required
                            class="mt-1 block w-24 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="mt-6 w-full bg-green-500 text-white py-3 rounded-lg text-lg font-semibold 
                                   hover:bg-green-600 transition-colors">
                        Proceed to Checkout
                    </button>

                    <!-- Product Information -->
                    <div class="mt-8">
                        <details class="border-b py-3">
                            <summary class="cursor-pointer font-semibold">ABOUT PRODUCT</summary>
                            <div class="mt-2 text-gray-600">
                                <?php echo htmlspecialchars($product['product_description'] ?? 'No description available.'); ?>
                            </div>
                        </details>

                        <details class="border-b py-3">
                            <summary class="cursor-pointer font-semibold">DELIVERY & RETURNS</summary>
                            <div class="mt-2 text-gray-600">
                                <p>Free delivery on orders over $100</p>
                                <p>30-day return policy</p>
                            </div>
                        </details>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Style for selected size */
        .size-option input[type="radio"]:checked+span {
            background-color: #22c55e;
            color: white;
            border-color: #22c55e;
        }
    </style>
</body>

</html>