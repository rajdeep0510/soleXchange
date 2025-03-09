<?php session_start(); ?>


<nav class="bg-gray-800 shadow-lg">    
    <!-- Main Navigation -->
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="index.php" class="text-white">
                    <img src="assets/images/logo.png" alt="Logo" class="h-8">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/soleXchange/" class="text-white hover:text-green-500 transition-colors duration-300">Home</a>
                <a href="/soleXchange/about/" class="text-white hover:text-green-500 transition-colors duration-300">About Us</a>
                <a href="/soleXchange/brands/" class="text-white hover:text-green-500 transition-colors duration-300">Brand</a>
                <a href="/soleXchange/sell/" class="text-white hover:text-green-500 transition-colors duration-300">Sell</a>
            </div>

            <!-- Search Bar -->
            <div class="hidden md:flex items-center">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search..." 
                        class="bg-gray-700 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-64"
                    >
                </div>
            </div>

            <!-- Auth Buttons -->
            <?php if($_SESSION['is_logged_in'] == 0): ?>
            <div class="flex items-center space-x-4">
                <a href="/soleXchange/login/" class="text-white hover:text-green-500 transition-colors duration-300">Log In</a>
                <a href="/soleXchange/register/" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors duration-300">Sign Up</a>
            </div>
            <?php else: ?>
            <div class="flex items-center space-x-4">
            <a href="/soleXchange/logout/" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors duration-300">Log out</a>
            </div>
            <?php endif; ?>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button class="text-white hover:text-green-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/soleXchange/" class="block text-white hover:text-green-500 py-2">Home</a>
            <a href="/soleXchange/about/" class="block text-white hover:text-green-500 py-2">About Us</a>
            <a href="/soleXchange/brands/" class="block text-white hover:text-green-500 py-2">Brand</a>
            <!-- Remove or update categories link if not needed -->
            <!-- <a href="categories.php" class="block text-white hover:text-green-500 py-2">Categories</a> -->
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.md\\:hidden button');
    const mobileMenu = document.querySelector('.md\\:hidden.hidden');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
