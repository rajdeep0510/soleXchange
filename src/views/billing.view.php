<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - SoleXchange</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <?php require __DIR__ . '/../helpers/navbar.php'; ?>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Checkout</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Order Summary -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                <div class="flex items-center mb-4">
                    <img src="<?php echo htmlspecialchars($_SESSION['order']['img_url']); ?>" 
                         alt="<?php echo htmlspecialchars($_SESSION['order']['product_name']); ?>"
                         class="w-24 h-24 object-cover rounded">
                    <div class="ml-4">
                        <h3 class="font-semibold"><?php echo htmlspecialchars($_SESSION['order']['product_name']); ?></h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($_SESSION['order']['brand_name']); ?></p>
                        <p class="text-sm">Size: <?php echo htmlspecialchars($_SESSION['order']['size']); ?></p>
                        <p class="text-sm">Quantity: <?php echo htmlspecialchars($_SESSION['order']['quantity']); ?></p>
                    </div>
                </div>
                <div class="border-t pt-4">
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>$<?php echo number_format($_SESSION['order']['product_price'], 2); ?></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg border-t pt-2">
                        <span>Total</span>
                        <span>$<?php echo number_format($_SESSION['order']['total_price'], 2); ?></span>
                    </div>
                </div>
            </div>

            <!-- Billing Form -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Billing Information</h2>
                <form action="/soleXchange/payment/" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                        <textarea id="address" name="address" rows="3" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-green-500 text-white py-3 rounded-lg text-lg font-semibold hover:bg-green-600 transition-colors">
                            Proceed to Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>