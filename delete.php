<?php session_start()?>
<?php 
    if(isset($_POST['removeProduct'])){
       unset($_SESSION['itemsInCart'][$_GET['k']]);
       $_SESSION['itemsInCart'] = array_values($_SESSION['itemsInCart']);
    }
?>
<?php include "./src/data.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./output.css">
</head>
<body>
    <?php include "header.php" ?>
    <?php if(isset($_GET['k'])):?>
        <?php $product = $_SESSION['itemsInCart'][$_GET['k']]; ?>
        <div class="container mx-auto mt-8 flex">
            <img src="./img/<?php echo $product['image'] ?>" class="" alt=" <?php echo $product['image'] ?> ">
            <div class="px-4">   
                <div class="flex text-2xl space-x-4 items-center">
                    <h1 class="font-semibold"><?php echo $product['name'] ?></h1>
                    <p class="py-1 px-4 bg-slate-700 text-white rounded">P<?php echo $product['price'] ?></p>
                </div>
                <div class="py-4 text-lg"><?php echo $product['description'] ?></div>
                <form method="post" action="cart.php">
                    <h1 class="text-2xl py-4">Size: <?php echo $product['size']?> </h1>
                    <div class="py-8 flex flex-col space-y-4">
                        <label for="quantity" class="text-2xl">Quantity: <?php echo $product['quantity']; ?></label>
                    </div>
                    <div class="space-x-4">
                        <button class="py-2 px-4 bg-slate-700 text-white rounded" type="submit" name="removeProduct">Confirm Product Removal</button>
                        <a href="." class="py-2 px-4 bg-red-500 text-white rounded">Cancel/Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    <?php endif ?>
</body>
</html>