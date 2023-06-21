<?php
    $_SESSION['numAtCart'] = isset($_SESSION['numAtCart'])? $_SESSION['numAtCart'] : 0;  
?>
<div class="container mx-auto mt-8 border-b-2 border-gray-200 py-2">
    <div class="flex justify-between items-center">
        <a href=".">
            <div class="text-4xl flex items-center space-x-2 text-gray-800">
                <i class="fa-solid fa-shop"></i>
                <h1 class="font-semibold ">Learn IT Easy Online Shop</h1>
            </div>
        </a>
        <a href="cart.php" class="py-2 px-6 bg-blue-500 text-white rounded flex items-center space-x-2">
            <i class="fa-solid fa-cart-shopping"></i>
            <div class="flex space-x-2">
                <p>Cart</p>
                <span class="bg-white px-2 rounded text-black font-semibold"><?php echo $_SESSION['numAtCart']?></span>
            </div>
        </a>
    </div>
</div>
