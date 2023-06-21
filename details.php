<?php session_start()?>
<?php include "./src/data.php" ?>
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
    <?php if(isset($_GET['key'])):?>
        <?php $product = $data[$_GET['key']]; ?>
        <?php $_SESSION['key'] = $_GET['key']; ?>
        <div class="container mx-auto mt-8 flex">
            <img src="./img/<?php echo $product['image'] ?>" class="flex-1 w-[500px]" alt=" <?php echo $product['image'] ?> ">
            <div class="px-4">   
                <div class="flex text-2xl space-x-4 items-center">
                    <h1 class="font-semibold"><?php echo $product['name'] ?></h1>
                    <p class="py-1 px-4 bg-slate-700 text-white rounded">P<?php echo $product['price'] ?></p>
                </div>
                <div class="py-4 text-lg"><?php echo $product['description'] ?></div>
                <form method="post" action="confirmation.php">
                    <h1 class="text-2xl py-4">Select Size: </h1>
                    <div class="flex space-x-4 px-4">
                        <label class="text-lg">
                            <input type="radio" id="xs" value="xs" name="size">
                            XS
                        </label>
                        <label class="text-lg">
                            <input type="radio" id="sm" value="sm" name="size">
                            SM
                        </label>
                        <label class="text-lg">
                            <input type="radio" id="md" value="md" name="size" checked>
                            MD
                        </label>
                        <label class="text-lg">
                            <input type="radio" id="lg" value="lg" name="size">
                            LG
                        </label>
                        <label class="text-lg">
                            <input type="radio" id="xl" value="xl" name="size">
                            XL
                        </label>
                    </div>
                    <div class="py-8 flex flex-col space-y-4">
                        <label for="quantity" class="text-2xl">Select Quantity:</label>
                        <input type="number" min="1" value="1" name="quantity" max="100" id="quantity" class="w-full px-2 py-2 text-lg border border-black rounded">
                    </div>
                    <div class="space-x-4">
                        <button class="py-2 px-4 bg-slate-700 text-white rounded" type="submit" name="addToCart">Add to cart</button>
                        <a href="." class="py-2 px-4 bg-red-500 text-white rounded">Cancel/Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    <?php endif ?>
</body>
</html>