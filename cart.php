<?php session_start() ?>
<?php 
    if(isset($_POST['updateCart'])){
        $_SESSION['numAtCart'] = 0;
        foreach ($_POST['numProd'] as $key => $value) {
            $_SESSION['itemsInCart'][$key]['quantity'] = $value;
            $_SESSION['numAtCart'] += $value;
        }
    }
?>
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
    <?php if(!isset($_SESSION['itemsInCart'])) : ?>
        <?php include "header.php" ?>
        <div class="my-8 text-2xl font-semibold container mx-auto">
            <h1>There's nothing in your cart yet</h1>
        </div>
    <?php endif ?>
    <?php if(isset($_SESSION['itemsInCart'])) :?>
    <?php include "header.php" ?>
    <?php print_r($_SESSION['itemsInCart']); ?>
    <form method="post">
    <div class="container mx-auto my-8">
        <table class="w-full border border-gray-200  rounded-2xl">
            <thead class="border-b border-gray-200">
                <tr class="">
                    <th class="py-4"></th>
                    <th class="py-4">Product</th>
                    <th class="py-4">Size</th>
                    <th class="py-4">Quantity</th>
                    <th class="py-4">Price</th>
                    <th class="py-4">Total</th>
                </tr>
            </thead>
            <tbody class="px-4 min-w-full rounded">
                <?php
                    $bgLast = count($_SESSION['itemsInCart']);
                    $totalPrice = 0;
                ?>
                <?php foreach ($_SESSION['itemsInCart'] as $key => $row): ?>
                    <?php
                        $bg = "bg-white";
                        if($key % 2 == 0){
                            $bg = "bg-slate-200";
                        }
                        $totalPrice += $row['price'] * $row['quantity'];
                    ?>
                    <tr class="<?php echo $bg;?>">
                        <td class="w-1/4 p-4 border-b border-gray-200">
                            <img src="./img/<?php echo $row['image']?>" alt="" class="w-1/4 rounded">
                        </td>
                        <td class="border-b border-gray-200 text-center"><?php echo $row['name'] ?> </td>
                        <td class="border-b border-gray-200 text-center"><?php echo $row['size'] ?></td>
                        <td class="border-b border-gray-200 text-center"><input type="number" class="py-2 px-4 rounded border-2 border-gray-300 text-center focus:outline-none focus:border-sky-400" min="1" max="100" name="numProd[]" value="<?php echo $row['quantity'] ?>"></td>
                        <td class="border-b border-gray-200 text-center">₱ <?php echo number_format($row['price'], 2, ".", ","); ?></td>
                        <td class="border-b border-gray-200 text-center">₱ <?php echo number_format($row['price'] * $row['quantity'], 2, ".", ",")?></td>
                        <td class="border-b border-gray-200 text-center font-semibold"><a href="delete.php?k=<?php echo $key?>" class="p-2 bg-red-500 rounded text-white "><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php endforeach ?>
                    <tr class="<?php echo $bgLast % 2 == 0? 'bg-slate-200' : 'bg-white'?>">
                        <td class="w-1/4 p-4 font-semibold">
                        </td>
                        <td class="py-4 text-center font-semibold">
                        </td>
                        <td class="py-4 text-center font-bold ">
                            Total:
                        </td>
                        <td class="py-4 text-center "><?php echo $_SESSION['numAtCart'] ?></td>
                        <td class="py-4 text-center font-semibold">....</td>
                        <td class="py-4 text-center font-bold">₱ <?php echo number_format($totalPrice, 2, ".", ",")?></td>
                        <td class="text-center font-semibold">....</td>
                    </tr>
            </tbody>
        </table>
        <div class="container mx-auto flex justify-between space-x-4 text-center">
            <a href="." class="py-4 bg-red-500 rounded text-white w-full"><i class="fa-solid fa-bag-shopping"></i> Continue Shopping</a>
            <button class="py-4 bg-green-500 rounded text-white w-full" type="submit" name="updateCart"><i class="fa-solid fa-pen-to-square"></i> Update</button>
            <a href="" class="py-4 bg-blue-500 rounded text-white w-full"><i class="fa-solid fa-right-from-bracket"></i> Checkout</a>
        </div>
    </div>
    </form>
    <?php endif ?>
</body>

</html>