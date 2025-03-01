<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoleXchange - Premium Shoe Store</title>
    <link href="src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <?php include_once './src/helpers/navbar.php'; ?>
  
    <main>
        <!-- Hero Section with Slider -->
        <section class="relative h-[500px] overflow-hidden">
            <div class="flex w-[300%] transition-transform duration-500">
                <div class="w-1/3">
                    <img src="https://www.superkicks.in/cdn/shop/files/desktop_banner01.png?v=1740142205" alt="Green Nike Sports Shoe" class="w-full h-[500px] object-cover">
                </div>
                <div class="w-1/3">
                    <img src="assets/images/hero-2.jpg" alt="White Athletic Shoe" class="w-full h-[500px] object-cover">
                </div>
                <div class="w-1/3">
                    <img src="assets/images/hero-3.jpg" alt="Pink Nike Air Max" class="w-full h-[500px] object-cover">
                </div>
            </div>
        </section>

        <!-- Recommended Products Section -->
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

        <!-- Most Popular Section -->
        <section class="px-8 py-12 bg-gray-100">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Most Popular</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Popular Product Card -->
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <img src="assets/images/popular-1.jpg" alt="Red Running Shoe" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">Item 1</h3>
                        <p class="text-green-600 font-bold my-2">$19.99</p>
                        <button class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition-colors duration-300">
                            Buy Now
                        </button>
                    </div>
                </div>
                <!-- Add more popular products as needed -->
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="px-8 py-16 bg-white">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8 text-gray-800">Subscribe to our Newsletter</h2>
                <form action="subscribe.php" method="POST" class="flex flex-col md:flex-row gap-4">
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Enter your email" 
                        required 
                        class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-green-500"
                    >
                    <button 
                        type="submit" 
                        class="bg-green-500 text-white px-8 py-2 rounded hover:bg-green-600 transition-colors duration-300"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script>
        // Basic slider functionality
        let currentSlide = 0;
        const slider = document.querySelector('.flex.w-[300%]');
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % 3;
            slider.style.transform = `translateX(-${currentSlide * 33.333}%)`;
        }

        // Auto-advance slides every 5 seconds
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>